<?php
$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

$idUser = $_GET['idUser'];

$pseudo = $_GET['pseudo'];

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
    header('location: ../index.php');
}

$stateRead = $pdo->prepare('SELECT * FROM user WHERE idUser = :id');
$stateRead->bindvalue(':id', $idUser);
$stateRead->execute();
$thisUser = $stateRead->fetch();

if ($thisUser['roleModo'] === 1) {
    $stateModo = $pdo->prepare('UPDATE user SET roleModo = 0 WHERE idUser = :id');
    $stateModo->bindvalue(':id', $idUser);
    $stateModo->execute();

    header('location: ./search_user.php?pseudo=' . $pseudo);
} else if ($thisUser['roleModo'] === 0) {
    $stateModo = $pdo->prepare('UPDATE user SET roleModo = 1 WHERE idUser = :id');
    $stateModo->bindvalue(':id', $idUser);
    $stateModo->execute();

    header('location: ./search_user.php?pseudo=' . $pseudo);
}
