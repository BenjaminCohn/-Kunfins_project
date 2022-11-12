<?php

$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

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
    header('location: ../index.php');
}

const ERROR_EXIST = "Le lien est déjà existant";

$stateReadArtiste = $pdo->prepare('SELECT * FROM artiste ORDER BY prenomArtiste');
$stateReadArtiste->execute();
$allArtiste = $stateReadArtiste->fetchAll();

$errors = [
    "morceau" => '',
    "youtube" => '',
    "tab" => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'morceau' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'youtube' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'tab' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $morceau = $_input['morceau'];
    $youtube = str_replace("watch", "embed", $_input['youtube']);
    $tab = $_input['tab'];
    $artiste = $_POST['artiste'];

    $stateVerifyLink = $pdo->prepare('SELECT morceau, idArtiste FROM liens
        WHERE morceau LIKE :morceau
        AND idArtiste = :id');
    $stateVerifyLink->bindvalue(':morceau', $morceau);
    $stateVerifyLink->bindValue(':id', $artiste);
    $stateVerifyLink->execute();
    $responseLink = $stateVerifyLink->fetch();

    if ($responseLink == true) {
        $errors['morceau'] = ERROR_EXIST;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $stateNewLink = $pdo->prepare('INSERT INTO liens VALUES(
            DEFAULT,
            :morceau,
            :youtube,
            :tab,
            :artiste)');
        $stateNewLink->bindvalue(':morceau', $morceau);
        $stateNewLink->bindvalue(':youtube', $youtube);
        $stateNewLink->bindvalue(':tab', $tab);
        $stateNewLink->bindvalue(':artiste', $artiste);
        $stateNewLink->execute();

        header('location: ./admin_link.php');
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="bg-secondary bg-gradient p-5 bg-opacity-75 border border-warning rounded">
        <form action="./new_link.php" method="POST">
            <div class="group-form">

                <?= $errors['morceau'] ? '<h5 class="mb-3" style = "color:darkorange">' . $errors['morceau'] . '</h5>' : '' ?>

                <div class="input-group mb-3">
                    <span for="morceau" class="input-group-text">TITRE</span>
                    <input name="morceau" type="text" class="form-control">
                </div>

                <div class="input-group mb-3">
                    <label for="artiste" class="input-group-text">BASSISTE</label>
                    <select class="form-select" name="artiste">
                        <option selected>Choose...</option>
                        <?php foreach ($allArtiste as $aa) { ?>
                            <option value="<?= $aa['idArtiste'] ?>"><?= $aa['prenomArtiste'] . " " . $aa['nomArtiste'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span for="youtube" class="input-group-text">YOUTUBE</span>
                    <input name="youtube" type="text" class="form-control">
                </div>

                <div class="input-group mb-3">
                    <span for="tab" class="input-group-text">TABLATURE</span>
                    <input name="tab" type="text" class="form-control">
                </div>
            </div>
            <button class="btn btn-outline-warning m-1">Submit</button>
        </form>
    </div>

</body>

</html>