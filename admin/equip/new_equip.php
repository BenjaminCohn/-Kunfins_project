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

const ERROR_EXIST = "L'equipboard est déjà existant";

$stateReadCat = $pdo->prepare('SELECT * FROM categorie ORDER BY nomCat');
$stateReadCat->execute();
$allCat = $stateReadCat->fetchAll();

$errors = [
    "nomMatos" => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'nomMatos' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'mrq' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'img' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $nomMatos = $_input['nomMatos'];
    $mrq = $_input['mrq'];
    $img = $_input['img'];
    $idCat = $_POST['idCat'];

    $stateVerifyEquip = $pdo->prepare('SELECT * FROM matos WHERE nomMatos = :nomMatos AND mrqMatos = :mrq');
    $stateVerifyEquip->bindvalue(':nomMatos', $nomMatos);
    $stateVerifyEquip->bindvalue(':mrq', $mrq);
    $stateVerifyEquip->execute();
    $responseEquip = $stateVerifyEquip->fetch();

    if ($responseEquip == TRUE) {
        $errors['nomMatos'] = ERROR_EXIST;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $stateNewEquip = $pdo->prepare('INSERT INTO matos VALUES(
            DEFAULT,
            :nomMatos,
            :mrqMatos,
            :imgMatos,
            :idCat)');
        $stateNewEquip->bindvalue(':nomMatos', $nomMatos);
        $stateNewEquip->bindvalue(':mrqMatos', $mrq);
        $stateNewEquip->bindvalue(':imgMatos', $img);
        $stateNewEquip->bindvalue(':idCat', $idCat);
        $stateNewEquip->execute();

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
        <form action="./new_equip.php" method="POST">
            <div class="group-form">

                <?= $errors['nomMatos'] ? '<h5 class="mb-3" style = "color:darkorange">' . $errors['nomMatos'] . '</h5>' : '' ?>

                <div class="input-group mb-3">
                    <span for="nomMatos" class="input-group-text">MARQUE & NOM</span>
                    <input name="nomMatos" type="text" class="form-control" value="<?= isset($nomMatos) ? "$nomMatos" : "" ?>">
                </div>

                <div class="input-group mb-3">
                    <span for="mrq" class="input-group-text">MARQUE</span>
                    <input name="mrq" type="text" class="form-control" value="<?= isset($mrq) ? "$mrq" : "" ?>">
                </div>

                <div class="input-group mb-3">
                    <label for="idCat" class="input-group-text">CATEGORIE</label>
                    <select class="form-select" name="idCat">
                        <option selected>Choose...</option>
                        <?php foreach ($allCat as $ac) { ?>
                            <option value="<?= $ac['idCat'] ?>"><?= $ac['nomCat'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span for="img" class="input-group-text">IMAGE (lien URL)</span>
                    <input name="img" type="text" class="form-control" value="<?= isset($img) ? "$img" : "" ?>">
                </div>
            </div>
            <button class="btn btn-outline-info m-1">Submit</button>
        </form>
    </div>

</body>

</html>