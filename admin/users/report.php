<?php

$pdo = require_once('../shared_admin/db.php');

$idUserReported = $_GET['idUserReported'];

$idSession = $_COOKIE['session'] ?? false;

if ($idSession) {
    $stateSession = $pdo->prepare('SELECT * FROM session WHERE idSession = :id');
    $stateSession->bindValue(':id', $idSession);
    $stateSession->execute();
    $session = $stateSession->fetch();

    $stateUser = $pdo->prepare('SELECT * FROM user WHERE idUser=:id AND roleAdmin = 1 OR roleModo = 1');
    $stateUser->bindValue(':id', $session['idUser']);
    $stateUser->execute();
    $user = $stateUser->fetch();
} else {
    $user = null;
    header('location: ./admin.php');
}

$injur = "Propos injurieux";
$racist = "Propos rasiste";
$fraude = "Tentative de fraude / anarque";
$pub = "Diffuse une pub / promotion";

$stateReadReported = $pdo->prepare('SELECT idReport, idUserReported, pseudoUser, reason, view FROM user, report 
    WHERE idUser = :id 
    AND idUserReported = :id');
$stateReadReported->bindvalue(':id', $idUserReported);
$stateReadReported->execute();
$userReport = $stateReadReported->fetchAll();

$stateReadAlert = $pdo->prepare('SELECT idUserAlert, pseudoUser FROM user, report WHERE idUser = :id AND idUserReported = :id');
$stateReadAlert->bindvalue(':id', $idUserReported);
$stateReadAlert->execute();
$userAlert = $stateReadAlert->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="d-flex justify-content-center">
        <div class="card primary bg-secondary m-3">
            <?php foreach ($userReport as $up) { ?>
                <?php if (str_starts_with($up['reason'], 'Propos injurieux')) { ?>
                    <?php
                    $stateReadAlert = $pdo->prepare('SELECT idUserAlert, pseudoUser FROM user, report 
                        WHERE idUser = :id 
                        AND idUserReported = :id
                        ');
                    $stateReadAlert->bindvalue(':id', $idUserReported);
                    $stateReadAlert->execute();
                    $userAlert = $stateReadAlert->fetch();
                    ?>
                    <div class="card-header">
                        <h2><?= $up['pseudoUser'] ?></h2>
                        <h4><?= "Reported by " . $userAlert['pseudoUser'] ?></h4>
                    </div>
                    <div class="card-body">
                        <p><?= $up['reason'] ?></p>
                        <?php if ($up['view'] == 0) { ?>
                            <a href="./view.php?idReport=<?= $up['idReport'] . "&idUserReport=" . $idUserReported ?>" class="btn btn-danger">VU</a>
                        <?php } else { ?>
                            <a href="./view.php?idReport=<?= $up['idReport'] . "&idUserReport=" . $idUserReported ?>" class="btn btn-dark">VU</a>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="card primary bg-secondary m-3">
            <?php foreach ($userReport as $up) { ?>
                <?php if (str_starts_with($up['reason'], 'Propos rasiste')) { ?>
                    <?php
                    $stateReadAlert = $pdo->prepare('SELECT idUserAlert, pseudoUser FROM user, report 
                        WHERE idUser = :id 
                        AND idUserReported = :id
                        ');
                    $stateReadAlert->bindvalue(':id', $idUserReported);
                    $stateReadAlert->execute();
                    $userAlert = $stateReadAlert->fetch();
                    ?>
                    <div class="card-header">
                        <h2><?= $up['pseudoUser'] ?></h2>
                        <h4><?= "Reported by " . $userAlert['pseudoUser'] ?></h4>
                    </div>
                    <div class="card-body">
                        <p><?= $up['reason'] ?></p>
                        <?php if ($up['view'] == 0) { ?>
                            <a href="./view.php?idReport=<?= $up['idReport'] . "&idUserReport=" . $idUserReported ?>" class="btn btn-danger">VU</a>
                        <?php } else { ?>
                            <a href="./view.php?idReport=<?= $up['idReport'] . "&idUserReport=" . $idUserReported ?>" class="btn btn-dark">VU</a>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="card primary bg-secondary m-3">
            <?php foreach ($userReport as $up) { ?>
                <?php if (str_starts_with($up['reason'], 'Tentative de fraude / anarque')) { ?>
                    <?php
                    $stateReadAlert = $pdo->prepare('SELECT idUserAlert, pseudoUser FROM user, report 
                        WHERE idUser = :id 
                        AND idUserReported = :id
                        ');
                    $stateReadAlert->bindvalue(':id', $idUserReported);
                    $stateReadAlert->execute();
                    $userAlert = $stateReadAlert->fetch();
                    ?>
                    <div class="card-header">
                        <h2><?= $up['pseudoUser'] ?></h2>
                        <h4><?= "Reported by " . $userAlert['pseudoUser'] ?></h4>
                    </div>
                    <div class="card-body">
                        <p><?= $up['reason'] ?></p>
                        <?php if ($up['view'] == 0) { ?>
                            <a href="./view.php?idReport=<?= $up['idReport'] . "&idUserReport=" . $idUserReported ?>" class="btn btn-danger">VU</a>
                        <?php } else { ?>
                            <a href="./view.php?idReport=<?= $up['idReport'] . "&idUserReport=" . $idUserReported ?>" class="btn btn-dark">VU</a>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="card primary bg-secondary m-3">
            <?php foreach ($userReport as $up) { ?>
                <?php if (str_starts_with($up['reason'], 'Diffuse une pub / promotion')) { ?>
                    <?php
                    $stateReadAlert = $pdo->prepare('SELECT idUserAlert, pseudoUser FROM user, report 
                        WHERE idUser = :id 
                        AND idUserReported = :id
                        ');
                    $stateReadAlert->bindvalue(':id', $idUserReported);
                    $stateReadAlert->execute();
                    $userAlert = $stateReadAlert->fetch();
                    ?>
                    <div class="card-header">
                        <h2><?= $up['pseudoUser'] ?></h2>
                        <h4><?= "Reported by " . $userAlert['pseudoUser'] ?></h4>
                    </div>
                    <div class="card-body">
                        <p><?= $up['reason'] ?></p>
                        <?php if ($up['view'] == 0) { ?>
                            <a href="./view.php?idReport=<?= $up['idReport'] . "&idUserReport=" . $idUserReported ?>" class="btn btn-danger">VU</a>
                        <?php } else { ?>
                            <a href="./view.php?idReport=<?= $up['idReport'] . "&idUserReport=" . $idUserReported ?>" class="btn btn-dark">VU</a>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

</body>

</html>