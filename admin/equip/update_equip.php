<?php
$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

$idMatos = $_GET['idMatos'];

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

$stateReadEquip = $pdo->prepare('SELECT matos.idCat, nomCat, idMatos, nomMatos, mrqMatos, imgMatos FROM categorie, matos
    WHERE categorie.idCat = matos.idCat
    AND idMatos = :id');
$stateReadEquip->bindvalue(':id', $idMatos);
$stateReadEquip->execute();
$thisEquip = $stateReadEquip->fetch();

$stateReadCat = $pdo->prepare('SELECT * FROM categorie');
$stateReadCat->execute();
$allCat = $stateReadCat->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'nom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'mrq' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'img' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $nom = $_input['nom'];
    $mrq = $_input['mrq'];
    $img = $_input['img'];
    $idCat = $_POST['idCat'];

    $stateUpdateEquip = $pdo->prepare('UPDATE matos SET
        nomMatos = :nom,
        mrqMatos = :mrq,
        imgMatos = :img,
        idCat = :id
        WHERE idMatos = :idMatos');
    $stateUpdateEquip->bindvalue(':nom', $nom);
    $stateUpdateEquip->bindvalue(':mrq', $mrq);
    $stateUpdateEquip->bindvalue(':img', $img);
    $stateUpdateEquip->bindvalue(':id', $idCat);
    $stateUpdateEquip->bindvalue(':idMatos', $idMatos);
    $stateUpdateEquip->execute();

    header('location: ./update_equip.php?idMatos=' . $idMatos);
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="d-flex justify-content-center">
        <form action="./update_equip.php?idMatos=<?= $idMatos ?>" method="post">
            <div class="card border-info bg-secondary mb-3" style="min-width: 56rem;">
                <div class="card-header">
                    <?= strtoupper($thisEquip['mrqMatos']) . " : " . $thisEquip['nomMatos'] ?>
                </div>
                <div class="card-body text-info">
                    <h5>NOM</h5>
                    <input name="nom" class="form-control mb-1" type="text" value="<?= $thisEquip['nomMatos'] ?>">
                </div>

                <div class="card-body text-info">
                    <h5>MARQUE</h5>
                    <input name="mrq" class="form-control mb-1" type="text" value="<?= $thisEquip['mrqMatos'] ?>">
                </div>

                <div class="card-body text-info">
                    <h5>IMAGE</h5>
                    <input name="img" class="form-control mb-1" type="text" value="<?= $thisEquip['imgMatos'] ?>">
                </div>

                <div class="card-body input-group mb-1">
                    <label for="artiste" class="input-group-text">CATEGORIE</label>
                    <select class="form-select" name="idCat">
                        <option selected value="<?= $thisEquip['idCat'] ?>"><?= $thisEquip['nomCat'] ?></option>
                        <?php foreach ($allCat as $ac) { ?>
                            <option value="<?= $ac['idCat'] ?>"><?= $ac['nomCat'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <button class="btn btn-outline-info">Submit</button>
        </form>
    </div>

</body>

</html>