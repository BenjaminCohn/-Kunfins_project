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

const ERROR_EXIST = "La catégorie est déjà existante";

$stateReadCat = $pdo->prepare('SELECT * FROM categorie ORDER BY nomCat');
$stateReadCat->execute();
$allCat = $stateReadCat->fetchAll();

$errors = [
    "nomCat" => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'nomCat' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $nomCat = $_input['nomCat'];

    $stateVerifyCat = $pdo->prepare('SELECT * FROM categorie WHERE nomCat = :nom');
    $stateVerifyCat->bindvalue(':nom', $nomCat);
    $stateVerifyCat->execute();
    $responseCat = $stateVerifyCat->fetch();

    if ($responseCat == TRUE) {
        $errors['nomCat'] = ERROR_EXIST;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $stateNewCat = $pdo->prepare('INSERT INTO categorie VALUES(
            DEFAULT,
            :nomCat)');
        $stateNewCat->bindvalue(':nomCat', $nomCat);
        $stateNewCat->execute();

        header('location: ./admin_equip.php');
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="bg-secondary bg-gradient p-5 bg-opacity-75 border border-info rounded">
        <form action="./new_cat.php" method="POST">
            <div class="group-form">

                <?= $errors['nomCat'] ? '<h5 class="mb-3" style = "color:darkorange">' . $errors['nomCat'] . '</h5>' : '' ?>

                <div class="input-group mb-3">
                    <span for="nomCat" class="input-group-text">NOUVELLE CATEGORIE</span>
                    <input name="nomCat" type="text" class="form-control" value="<?= isset($nomMatos) ? "$nomMatos" : "" ?>">
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text">CATEGORIEs EXISTANTEs</label>
                    <select class="form-select">
                        <option selected>Check...</option>
                        <?php foreach ($allCat as $ac) { ?>
                            <option value="<?= $ac['idCat'] ?>"><?= $ac['nomCat'] ?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>
            <button class="btn btn-outline-info m-1">Submit</button>
        </form>
    </div>

</body>

</html>