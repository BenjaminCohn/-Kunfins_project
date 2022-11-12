<pre>
<?php

$pdo = require_once './shared/db.php';

$idSession = $_COOKIE['session'] ?? false;
$idList = $_GET['idList'];

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

$idList = intval($_GET['idList']) ?? null;

$stateIdList = $pdo->prepare('SELECT * FROM lister
WHERE idList = :idL');
$stateIdList->bindValue(':idL', $idList);
$stateIdList->execute();
$idL = $stateIdList->fetch();

$cat1 = $_GET['idArtiste1'] ?? null;
$cat2 = $_GET['idArtiste2'] ?? null;
$cat3 = $_GET['idArtiste3'] ?? null;
$cat4 = $_GET['idArtiste4'] ?? null;
$cat5 = $_GET['idArtiste5'] ?? null;

// Envoie une requete pour récupérer les information des artistes
if ($cat1) {
    $stateRead = $pdo->prepare('SELECT idArtiste1, prenomArtiste, nomArtiste, descArtiste, imgArtiste, idList 
    FROM artiste, lister
    WHERE artiste.idArtiste = lister.idArtiste1
    AND idList = :id
    AND idArtiste1 = :idC1');
    $stateRead->bindValue(':idC1', $_GET['idArtiste1']);
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res = $stateRead->fetchAll();

    // Envoie une requete pour récupérer les informations des instrument qu'utilisent les artistes
    $stateRead = $pdo->prepare('SELECT nomMatos, imgMatos, idList from matos, utiliser, lister
    WHERE idList = :id
    AND matos.idMatos = utiliser.idMatos
    AND utiliser.idArtiste = lister.idArtiste1');
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res2 = $stateRead->fetchAll();

    $stateRead = $pdo->prepare('SELECT * FROM liens, lister
    WHERE idList = :id
    AND idlien = idLien1');
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res3 = $stateRead->fetchAll();
} else if ($cat2) {
    $stateRead = $pdo->prepare('SELECT idArtiste2, prenomArtiste, nomArtiste, descArtiste, imgArtiste, idList 
    FROM artiste, lister
    WHERE artiste.idArtiste = lister.idArtiste2
    AND idList = :id
    AND idArtiste2 = :idC2');
    $stateRead->bindValue(':idC2', $_GET['idArtiste2']);
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res = $stateRead->fetchAll();

    $stateRead = $pdo->prepare('SELECT nomMatos, imgMatos, idList from matos, utiliser, lister
    WHERE idList = :id
    AND matos.idMatos = utiliser.idMatos
    AND utiliser.idArtiste = lister.idArtiste2');
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res2 = $stateRead->fetchAll();

    $stateRead = $pdo->prepare('SELECT * FROM liens, lister
    WHERE idList = :id
    AND idlien = idLien2');
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res3 = $stateRead->fetchAll();
} else if ($cat3) {
    $stateRead = $pdo->prepare('SELECT idArtiste3, prenomArtiste, nomArtiste, descArtiste, imgArtiste, idList 
    FROM artiste, lister
    WHERE artiste.idArtiste = lister.idArtiste3
    AND idList = :id
    AND idArtiste3 = :idC3');
    $stateRead->bindValue(':idC3', $_GET['idArtiste3']);
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res = $stateRead->fetchAll();

    $stateRead = $pdo->prepare('SELECT nomMatos, imgMatos, idList from matos, utiliser, lister
    WHERE idList = :id
    AND matos.idMatos = utiliser.idMatos
    AND utiliser.idArtiste = lister.idArtiste3');
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res2 = $stateRead->fetchAll();

    $stateRead = $pdo->prepare('SELECT * FROM liens, lister
    WHERE idList = :id
    AND idlien = idLien3');
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res3 = $stateRead->fetchAll();
} else if ($cat4) {
    $stateRead = $pdo->prepare('SELECT idArtiste4, prenomArtiste, nomArtiste, descArtiste, imgArtiste, idList 
    FROM artiste, lister
    WHERE artiste.idArtiste = lister.idArtiste4
    AND idList = :id
    AND idArtiste4 = :idC4');
    $stateRead->bindValue(':idC4', $_GET['idArtiste4']);
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res = $stateRead->fetchAll();

    $stateRead = $pdo->prepare('SELECT nomMatos, imgMatos, idList from matos, utiliser, lister
    WHERE idList = :id
    AND matos.idMatos = utiliser.idMatos
    AND utiliser.idArtiste = lister.idArtiste4');
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res2 = $stateRead->fetchAll();

    $stateRead = $pdo->prepare('SELECT * FROM liens, lister
    WHERE idList = :id
    AND idlien = idLien4');
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res3 = $stateRead->fetchAll();
} else if ($cat5) {
    $stateRead = $pdo->prepare('SELECT idArtiste5, prenomArtiste, nomArtiste, descArtiste, imgArtiste, idList 
    FROM artiste, lister
    WHERE artiste.idArtiste = lister.idArtiste5
    AND idList = :id
    AND idArtiste5 = :idC5');
    $stateRead->bindValue(':idC5', $_GET['idArtiste5']);
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res = $stateRead->fetchAll();

    $stateRead = $pdo->prepare('SELECT nomMatos, imgMatos, idList from matos, utiliser, lister
    WHERE idList = :id
    AND matos.idMatos = utiliser.idMatos
    AND utiliser.idArtiste = lister.idArtiste5');
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res2 = $stateRead->fetchAll();

    $stateRead = $pdo->prepare('SELECT * FROM liens, lister
    WHERE idList = :id
    AND idlien = idLien5');
    $stateRead->bindValue(':id', $idList);
    $stateRead->execute();
    $res3 = $stateRead->fetchAll();
}

$stateUser = $pdo->prepare('SELECT lister.idList, likes
FROM lister, user
WHERE lister.idList = :list
');
$stateUser->bindValue(':list', $idList);
$stateUser->execute();
$resL = $stateUser->fetch();

$stateCom = $pdo->prepare('SELECT DISTINCT comment.idUser, pseudoUser, commentaire, DATE_FORMAT(date, "%d/%m/%y - %H:%i") as date FROM comment, user, lister 
WHERE comment.idUser = user.idUser 
AND comment.idList = :list
ORDER BY date DESC');
$stateCom->bindValue(':list', $idList);
$stateCom->execute();
$com = $stateCom->fetchAll();

?>
</pre>
<!DOCTYPE html>
<html lang="fr">

<?php require_once  './shared/head.php' ?>

<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="main">
            <?php require_once './shared/topbar.php' ?>
            <div class="content">
                <div class="absolute">
                    <div class="btnBurger">
                        <div class="cle">
                            <img class="imgCle" src="../css/clef-de-fa.png" alt="clé de fa">
                        </div>
                        <div class="sidebar">
                            <div class="sb"></div>
                            <a href="/resume.php?idList=<?= $idList . "&idArtiste1=" . $idL['idArtiste1'] ?>" class="sba">1</a>
                            <div class="sb"></div>
                            <a href="/resume.php?idList=<?= $idList . "&idArtiste2=" . $idL['idArtiste2'] ?>" class="sba">2</a>
                            <div class="sb"></div>
                            <a href="/resume.php?idList=<?= $idList . "&idArtiste3=" . $idL['idArtiste3'] ?>" class="sba">3</a>
                            <div class="sb"></div>
                            <a href="/resume.php?idList=<?= $idList . "&idArtiste4=" . $idL['idArtiste4'] ?>" class="sba">4</a>
                            <div class="sb"></div>
                            <a href="/resume.php?idList=<?= $idList . "&idArtiste5=" . $idL['idArtiste5'] ?>" class="sba">5</a>
                            <div id="sbLast" class="sb"></div>
                        </div>
                    </div>
                </div>
                <?php // require_once './shared/content.php' ?>

                <div class="divall">
                <!-- Les boucles foreach repondent aux requete SQL du fichier index.php : $r est la variable qui recherche dans la boucle les élément appelés dans la requete SQL, 
                elles sont suivies de crochets, cotes et du nom de l'attribut indiqué dans la requete SQL -->
                <div class="bio">
                    <div class="headlist">
                        <h1>Biographie</h1><?php foreach ($res as $r) { ?>
                            <span class="like">
                                <img src="./css/img_like&btn/bass-guitar (2).png" alt="" width="35px" height="35px"><?= $resL['likes'] ?>
                            </span>
                    </div>
                    <h2 class="headlist"><?= $r['prenomArtiste'] . " " . $r['nomArtiste'] ?></h2>
                    <br>
                    <div class="imgDesc">
                        <img src="<?= $r['imgArtiste'] ?>" alt="">
                        <ul>
                            <?php foreach ($res2 as $r) { ?>
                                <li>
                                    <a href="<?= $r['imgMatos'] ?>">
                                        <?= $r['nomMatos'] ?>
                                    </a>
                                    <img src="" alt="">
                                </li>
                            <?php }; ?>
                        </ul>
                    </div>
                    <div class="matos">
                        <?php foreach ($res as $r) { ?>
                            <p><?= $r['descArtiste'] ?></p>
                        <?php }; ?>
                    <?php }; ?>
                    </div>
                </div>

                <div class="play">
                    <h1>Let's Play</h1>
                    <div class="play2">
                        <?php foreach ($res3 as $r) { ?>
                            <div class="play3">
                                <h2>Lien de tablature :</h2>
                                <a href="<?= $r['tab'] ?>" target="_blank"><?= $r['tab'] ?></a>
                                <iframe width="560" height="315" src="<?= $r['youtube'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        <?php } ?>
                            <div class="com">
                                <?php foreach ($com as $c) { ?>
                                    <div>
                                        <a href="./reportUser.php?idRep=<?= $c['idUser'] ?>"><img src="./css/img_like&btn/alerte.png" alt="" width="25px" height="25px"></a> <strong><?= $c['pseudoUser'] ?> :</strong>
                                            <?= $c['date'] . " | " . $c['commentaire'] ?>
                                </div>
                                <?php }; ?>
                                <?php if ($idSession) { ?>
                                    <form action="./new_com.php" method="POST">
                                        <label><?=$user['pseudoUser'] ?> : </label>
                                        <textarea name="com" id="com" cols="65" rows="7"></textarea>
                                        <input type="text" name="idList" value="<?= $idList ?>" style="visibility : hidden">
                                        <input type="text" name="idArtiste" value="<?= $cat1 ?>" style="visibility : hidden">
                                        <button><img src="../css/img_like&btn/chill.png" alt="" width="35px" height="35px"></button>
                                    </form>
                                <?php }; ?>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php require_once './shared/footer.php' ?>
</body>

<script src="../js/btn_sidebar.js"></script>

</html>