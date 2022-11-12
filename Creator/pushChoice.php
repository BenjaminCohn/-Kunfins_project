<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $pdo = require_once('../shared/db.php');

    $idSession = $_COOKIE['session'] ?? false;

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

    $stateOrder = $pdo->prepare('SELECT count(*) as num FROM lister');
    $stateOrder->execute();
    $number = $stateOrder->fetch();

    $style = $_POST['style'];
    $artiste1 = $_POST['artiste1'];
    $artiste2 = $_POST['artiste2'];
    $artiste3 = $_POST['artiste3'];
    $artiste4 = $_POST['artiste4'];
    $artiste5 = $_POST['artiste5'];

    $morceau1 = $_POST['morceau1'];
    $morceau2 = $_POST['morceau2'];
    $morceau3 = $_POST['morceau3'];
    $morceau4 = $_POST['morceau4'];
    $morceau5 = $_POST['morceau5'];

    var_dump($morceau1);

    if ($morceau1 === 'morceau1' || $morceau2 === 'morceau2' || $morceau3 === 'morceau3' || $morceau4 === 'morceau4' || $morceau5 === 'morceau5') {
        $previous = "javascript:history.go(-1)";
        header('location:' . $previous);
    } else {
        $stateInsertOrder = $pdo->prepare('INSERT INTO lister (
            idUser, idStyle, 
            idArtiste1, idLien1, ordre1, 
            idArtiste2, idLien2, ordre2, 
            idArtiste3, idLien3, ordre3, 
            idArtiste4, idLien4, ordre4, 
            idArtiste5, idLien5, ordre5
            ) VALUES (
            :idUser, :idStyle,
            :idArtiste1, :idLien1, 1,
            :idArtiste2, :idLien2, 2,
            :idArtiste3, :idLien3, 3,
            :idArtiste4, :idLien4, 4, 
            :idArtiste5, :idLien5, 5)');
        $stateInsertOrder->bindValue(':idUser', $user['idUser']);
        $stateInsertOrder->bindValue(':idStyle', $style);

        $stateInsertOrder->bindValue(':idArtiste1', $artiste1);
        $stateInsertOrder->bindValue(':idLien1', $morceau1);

        $stateInsertOrder->bindValue(':idArtiste2', $artiste2);
        $stateInsertOrder->bindValue(':idLien2', $morceau2);

        $stateInsertOrder->bindValue(':idArtiste3', $artiste3);
        $stateInsertOrder->bindValue(':idLien3', $morceau3);

        $stateInsertOrder->bindValue(':idArtiste4', $artiste4);
        $stateInsertOrder->bindValue(':idLien4', $morceau4);

        $stateInsertOrder->bindValue(':idArtiste5', $artiste5);
        $stateInsertOrder->bindValue(':idLien5', $morceau5);

        $stateInsertOrder->execute();


        header('location: ./selectStyle.php?style=' . $style);
    }
}