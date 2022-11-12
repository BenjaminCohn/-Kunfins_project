<?php

$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

$idArtiste = $_GET['idArtiste'];
$bass = $_GET['bass'] ?? null;
$amp = $_GET['amp'] ?? null;
$effect = $_GET['effect'] ?? null;

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

if ($bass !== NULL) {
    $stateDeleteMatos = $pdo->prepare('DELETE FROM utiliser WHERE idArtiste = :artiste AND idMatos = :matos');
    $stateDeleteMatos->bindValue(':artiste', $idArtiste);
    $stateDeleteMatos->bindvalue(':matos', $bass);
    $stateDeleteMatos->execute();
} else if ($amp !== NULL) {
    $stateDeleteMatos = $pdo->prepare('DELETE FROM utiliser WHERE idArtiste = :artiste AND idMatos = :matos');
    $stateDeleteMatos->bindValue(':artiste', $idArtiste);
    $stateDeleteMatos->bindvalue(':matos', $amp);
    $stateDeleteMatos->execute();
} else if ($effect !== NULL) {
    $stateDeleteMatos = $pdo->prepare('DELETE FROM utiliser WHERE idArtiste = :artiste AND idMatos = :matos');
    $stateDeleteMatos->bindValue(':artiste', $idArtiste);
    $stateDeleteMatos->bindvalue(':matos', $effect);
    $stateDeleteMatos->execute();
}


header('location: ./update_matos.php?idArtiste=' . $idArtiste);
