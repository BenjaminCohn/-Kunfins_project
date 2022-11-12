<?php

$pdo = require_once('../shared_admin/db.php');

$idReport = $_GET['idReport'];
$idUserReported = $_GET['idUserReport'];

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

$stateReadReport = $pdo->prepare('SELECT view, idUserReported FROM report WHERE idReport = :id');
$stateReadReport->bindvalue(':id', $idReport);
$stateReadReport->execute();
$view = $stateReadReport->fetch();

var_dump($idUserReported);

if ($view['view'] == 0) {
    $stateUpdate = $pdo->prepare('UPDATE report SET
        view = 1
        WHERE idReport = :id');
    $stateUpdate->bindvalue(':id', $idReport);
    $stateUpdate->execute();

    header('location: ./report.php?idUserReported=' . $idUserReported);
} else if ($view['view'] == 1) {
    $stateUpdate = $pdo->prepare('UPDATE report SET
        view = 0
        WHERE idReport = :id');
    $stateUpdate->bindvalue(':id', $idReport);
    $stateUpdate->execute();

    header('location: ./report.php?idUserReported=' . $idUserReported);
}
