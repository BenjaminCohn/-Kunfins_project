<pre>
<?php

$pdo = require_once('../shared/db.php');

$idSession = $_COOKIE['session'] ?? false;
$idList = $_GET['idList'];

if ($idSession) {
    $stateSession = $pdo->prepare('SELECT * FROM session WHERE idSession = :id');
    $stateSession->bindValue(':id', $idSession);
    $stateSession->execute();
    $session = $stateSession->fetch();

    $stateUser = $pdo->prepare('SELECT * FROM user WHERE idUser = :id');
    $stateUser->bindValue(':id', $session['idUser']);
    $stateUser->execute();
    $user = $stateUser->fetch();

    $stateList = $pdo->prepare('SELECT idUser FROM lister
    WHERE idList = :list');
    $stateList->bindvalue(':list', $idList);
    $stateList->execute();
    $listMatch = $stateList->fetch();
} else {
    $user = null;

    header('location: ../index.php');
}

if ($listMatch['idUser'] !== $user['idUser']) {
    header('location: ../index.php');
}

$stateRead1 = $pdo->prepare('SELECT 
    ordre1, idArtiste1, a1.nomArtiste AS nomArtiste1, a1.prenomArtiste AS prenomArtiste1, l1.morceau AS morceau1,
    ordre2, idArtiste2, a2.nomArtiste AS nomArtiste2, a2.prenomArtiste AS prenomArtiste2, l2.morceau AS morceau2,
    ordre3, idArtiste3, a3.nomArtiste AS nomArtiste3, a3.prenomArtiste AS prenomArtiste3, l3.morceau AS morceau3,
    ordre4, idArtiste4, a4.nomArtiste AS nomArtiste4, a4.prenomArtiste AS prenomArtiste4, l4.morceau AS morceau4,
    ordre5, idArtiste5, a5.nomArtiste AS nomArtiste5, a5.prenomArtiste AS prenomArtiste5, l5.morceau AS morceau5,
    lister.idList, nomStyle, likes
    FROM lister, style,
    artiste AS a1, liens AS l1, 
    artiste AS a2, liens AS l2,
    artiste AS a3, liens AS l3,
    artiste AS a4, liens AS l4,
    artiste AS a5, liens AS l5
    WHERE idUser = :user
    AND lister.idArtiste1 = a1.idArtiste
    AND lister.idLien1 = l1.idLien
    AND lister.idArtiste2 = a2.idArtiste
    AND lister.idLien2 = l2.idLien
    AND lister.idArtiste3 = a3.idArtiste
    AND lister.idLien3 = l3.idLien
    AND lister.idArtiste4 = a4.idArtiste
    AND lister.idLien4 = l4.idLien
    AND lister.idArtiste5 = a5.idArtiste
    AND lister.idLien5 = l5.idLien
    AND style.idStyle = lister.idStyle
    ORDER BY lister.idStyle ASC');
$stateRead1->bindValue(':user', $user['idUser']);
$stateRead1->execute();
$res = $stateRead1->fetchALL();
?>
</pre>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared/head.php' ?>

<body>
    <?php require_once '../shared/header.php' ?>
    <div class="container">
        <?php require_once '../shared/topbar.php' ?>
        <div class="main">
            <div class="warning">
                <h1>ATTENTION !</h1>
                <h3>Vous êtes sur le point de supprimer votre liste : </h3>
                <div class="list" style="margin: 10px">
                    <?php foreach ($res as $r) ?>
                    <h2 class="headlist" style="margin: 10px"><?= $r['nomStyle'] ?>
                        <span class="like">
                            <img src="../css/img_like&btn/bass-guitar (2).png" alt="" width="35px" height="35px"><?= $r['likes'] ?>
                        </span>
                    </h2>
                    <ul>
                        <li><?= "<h4>" . $r['ordre1'] . ' - ' . strtoupper($r['prenomArtiste1'] . " " . $r['nomArtiste1']) . " : " . "</h4>" . $r['morceau1'] ?></li>
                        <li><?= "<h4>" . $r['ordre2'] . ' - ' . strtoupper($r['prenomArtiste2'] . " " . $r['nomArtiste2']) . " : " . "</h4>" . $r['morceau2'] ?></li>
                        <li><?= "<h4>" . $r['ordre3'] . ' - ' . strtoupper($r['prenomArtiste3'] . " " . $r['nomArtiste3']) . " : " . "</h4>" . $r['morceau3'] ?></li>
                        <li><?= "<h4>" . $r['ordre4'] . ' - ' . strtoupper($r['prenomArtiste4'] . " " . $r['nomArtiste4']) . " : " . "</h4>" . $r['morceau4'] ?></li>
                        <li><?= "<h4>" . $r['ordre5'] . ' - ' . strtoupper($r['prenomArtiste5'] . " " . $r['nomArtiste5']) . " : " . "</h4>" . $r['morceau5'] ?></li>
                    </ul>
                </div>
                <h3>En supprimant votre liste, vous supprimer également ses likes et son classement sera perdu</h3>
                <h3>Etes vous sûr de vouloir supprimer votre liste ?</h3>
                <span><a href="./profile.php">NON</a><a href="">OUI</a></span>
            </div>
        </div>
    </div>
    <?php require_once '../shared/footer.php' ?>
</body>

</html>