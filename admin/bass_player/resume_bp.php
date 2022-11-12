<?php

$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

$idArtiste = $_GET['idArtiste'];

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

$stateRead = $pdo->prepare('SELECT * FROM artiste WHERE idArtiste = :id');
$stateRead->bindvalue(':id', $idArtiste);
$stateRead->execute();
$thisArtiste = $stateRead->fetch();

$stateReadBass = $pdo->prepare('SELECT DISTINCT nomMatos FROM utiliser, matos 
    WHERE idArtiste = :id
    AND matos.idMatos = utiliser.idMatos
    AND idCat = 1');
$stateReadBass->bindvalue(':id', $idArtiste);
$stateReadBass->execute();
$thisBass = $stateReadBass->fetchAll();

$stateReadAmp = $pdo->prepare('SELECT DISTINCT nomMatos FROM utiliser, matos 
    WHERE idArtiste = :id
    AND matos.idMatos = utiliser.idMatos
    AND idCat = 2');
$stateReadAmp->bindvalue(':id', $idArtiste);
$stateReadAmp->execute();
$thisAmp = $stateReadAmp->fetchAll();

$stateReadEffect = $pdo->prepare('SELECT DISTINCT nomMatos FROM utiliser, matos 
    WHERE idArtiste = :id
    AND matos.idMatos = utiliser.idMatos
    AND idCat != 1
    AND idCat != 2');
$stateReadEffect->bindvalue(':id', $idArtiste);
$stateReadEffect->execute();
$thisEffect = $stateReadEffect->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="d-flex justify-content-center mb-3">
        <div class="card border-success bg-secondary" style="max-width: 1350px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= $thisArtiste['imgArtiste'] ?>" alt="" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title"><?= $thisArtiste['prenomArtiste'] . " " . $thisArtiste['nomArtiste'] ?></h2>
                        <h4 class="card-text"><?= $thisArtiste['groupeArtiste'] ?></h4>
                        <p class="card-text"><?= $thisArtiste['descArtiste'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-success mb-3 ms-4" style="max-width: 18rem;">
            <div class="card-header bg-secondary">
                <h4>Matos
                    <a href="./update_matos.php?idArtiste=<?= $thisArtiste['idArtiste'] ?>">
                        <button class="btn btn-success">UPDATE</button>
                    </a>
                </h4>
            </div>
            <div class="card-body bg-secondary">
                <h5 class="card-title">Basse</h5>
                <ul>
                    <?php foreach ($thisBass as $tb) { ?>
                        <li><?= $tb['nomMatos'] ?></li>
                    <?php } ?>
                </ul>

                <?php if (!empty($thisAmp)) { ?>
                    <h5 class="card-title">Amplis</h5>
                    <ul>
                        <?php foreach ($thisAmp as $ta) { ?>
                            <li><?= $ta['nomMatos'] ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>

                <?php if (!empty($thisEffect)) { ?>
                    <h5 class="card-title">Effect</h5>
                    <ul>
                        <?php foreach ($thisEffect as $te) { ?>
                            <li><?= $te['nomMatos'] ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>


</body>

</html>