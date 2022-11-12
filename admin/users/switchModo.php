<?php
$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

$idUser = $_GET['idUser'];

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
$res_users = $stateRead->fetch();

if ($res_users['roleModo'] === 1) {
    $stateModo = $pdo->prepare('UPDATE user SET roleModo = 0 WHERE idUser = :id');
    $stateModo->bindvalue(':id', $idUser);
    $stateModo->execute();

    header('location: ./admin_user.php');
} else if ($res_users['roleModo'] === 0) {
    $stateModo = $pdo->prepare('UPDATE user SET roleModo = 1 WHERE idUser = :id');
    $stateModo->bindvalue(':id', $idUser);
    $stateModo->execute();

    header('location: ./admin_user.php');
}
