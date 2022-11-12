<?php

$pdo = require_once '../shared/db.php';

$idSession = $_COOKIE['session'] ?? false;
$idList = $_GET['idList'] ?? null;

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
}

$updateLike = $pdo->prepare('UPDATE likes SET isLike = 0 
    WHERE idUser = :user
    AND idList = :list');
$updateLike->bindValue(':user', $user['idUser']);
$updateLike->bindValue(':list', $idList);
$updateLike->execute();

$stateCountLikes = $pdo->prepare('SELECT likes as num FROM lister WHERE idList = :idList');
$stateCountLikes->bindValue(':idList', $idList);
$stateCountLikes->execute();
$number = $stateCountLikes->fetch();

$addLike = intval($number['num']) - 1;

$stateAddLike = $pdo->prepare('UPDATE lister SET likes = :likes WHERE idList = :idList');
$stateAddLike->bindValue(':idList', $idList);
$stateAddLike->bindValue(':likes', ($number['num'] - 1));
$stateAddLike->execute();

header('Location: ../index.php');
