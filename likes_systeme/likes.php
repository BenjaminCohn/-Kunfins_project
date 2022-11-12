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

$exist = $pdo->prepare('SELECT * FROM likes 
WHERE idUser = :user
AND idList = :list
AND isLike = :like');
$exist->bindValue(':user', $user['idUser']);
$exist->bindValue(':list', $idList);
$exist->bindValue(':like', 0);
$exist->execute();
$isExist = $exist->fetch();

var_dump($isExist);
// die;

if (!$isExist) {
    $stateLikes = $pdo->prepare('INSERT INTO likes VALUES(
        DEFAULT,
        :idUser,
        :idList,
        :isLike)
        ');
    $stateLikes->bindValue(':idUser', $user['idUser']);
    $stateLikes->bindValue(':idList', $idList);
    $stateLikes->bindValue(':isLike', TRUE);
    $stateLikes->execute();
} else {
    $updateLike = $pdo->prepare('UPDATE likes SET isLike = 1 
    WHERE idUser = :user
    AND idList = :list');
    $updateLike->bindValue(':user', $user['idUser']);
    $updateLike->bindValue(':list', $idList);
    $updateLike->execute();
}

$stateCountLikes = $pdo->prepare('SELECT likes as num FROM lister WHERE idList = :idList');
$stateCountLikes->bindValue(':idList', $idList);
$stateCountLikes->execute();
$number = $stateCountLikes->fetch();

$addLike = intval($number['num']) + 1;

$stateAddLike = $pdo->prepare('UPDATE lister SET likes = :likes WHERE idList = :idList');
$stateAddLike->bindValue(':idList', $idList);
$stateAddLike->bindValue(':likes', ($number['num'] + 1));
$stateAddLike->execute();


header('Location: ../');
