<?php

$pdo = require_once './shared/db.php';

$idSession = $_COOKIE['session'] ?? false;

$idRep = $_GET['idRep'];

if ($idSession) {
    $stateSession = $pdo->prepare('SELECT * FROM session WHERE idSession = :id');
    $stateSession->bindValue(':id', $idSession);
    $stateSession->execute();
    $session = $stateSession->fetch();

    $stateUser = $pdo->prepare('SELECT * FROM user WHERE idUser=:id');
    $stateUser->bindValue(':id', $session['idUser']);
    $stateUser->execute();
    $user = $stateUser->fetch();
} else {
    $user = null;
}

$injur = "Propos injurieux";
$racist = "Propos rasiste";
$fraude = "Tentative de fraude / anarque";
$pub = "Diffuse une pub / promotion";

$chooseReport = [
    array("reason" => $injur),
    array("reason" => $racist),
    array("reason" => $fraude),
    array("reason" => $pub),
];

const ERROR_SELECT = "Vous devez sélectionner un choix";

$errors = [
    'reason' => '',
];

$stateReadUser = $pdo->prepare('SELECT * FROM user WHERE idUser = :id');
$stateReadUser->bindValue(':id', $idRep);
$stateReadUser->execute();
$userRep = $stateReadUser->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        "com" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $reason = $_POST['reason'] . " : " . $_input['com'];

    if ($_POST['reason'] !== $injur && $_POST['reason'] !== $racist && $_POST['reason'] !== $fraude && $_POST['reason'] !== $pub) {
        $errors['reason'] = ERROR_SELECT;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $stateReport = $pdo->prepare('INSERT INTO report VALUES(
            DEFAULT,
            :idRep,
            :idAlert,
            :reason,
            DEFAULT)
            ');
        $stateReport->bindvalue(':idRep', $idRep);
        $stateReport->bindvalue(':idAlert', $user['idUser']);
        $stateReport->bindvalue(':reason', $reason);
        $stateReport->execute();

        $success = "Le report a bien été envoyé et sera traiter dans les plus bref délais";

        header('refresh:3;url=./index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once './shared/head.php' ?>

<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="main">
            <?php require_once './shared/topbar.php' ?>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
                <h2><?= $success ?></h2>
            <?php } else { ?>
                <div class="report">
                    <form action="./reportUser.php?idRep=<?= $idRep ?>" method="POST">
                        <h2>Vous êtes sur le point de report <?= $userRep['pseudoUser'] ?></h2>
                        <?= $errors['reason'] ? '<h3 class="mb-3" style = "color:red">' . $errors['reason'] . '</h3>' : '' ?>
                        <select name="reason">
                            <option>Slectionnez la raison du report</option>
                            <?php foreach ($chooseReport as $cr) { ?>
                                <option value="<?= $cr["reason"] ?>"><?= $cr["reason"] ?></option>
                            <?php } ?>
                        </select>

                        <div class="textarea">
                            <label for="com">Commentaire</label>
                            <textarea name="com" cols="60" rows="7"></textarea>
                        </div>
                        <button>Submit</button>
                    </form>
                </div>
            <?php } ?>


        </div>
    </div>
</body>

</html>