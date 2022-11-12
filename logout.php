<?php

$pdo = require_once './shared/db.php';

$idSession = $_COOKIE['session'];

if ($idSession) {
    $stateLogout = $pdo->prepare('DELETE FROM session WHERE idSession = :id');
    $stateLogout->bindvalue(':id', $idSession);
    $stateLogout->execute();
    setcookie('session', '', time() - 1);
    header('Location: ./login.php');
}
