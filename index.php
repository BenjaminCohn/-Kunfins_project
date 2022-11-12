<pre>
<?php

$pdo = require_once './shared/db.php';

$idSession = $_COOKIE['session'] ?? false;
$idList = $_GET['idList'] ?? null;
$idStyle = $_GET['idStyle'] ?? null;

if ($idSession) {
    $stateSession = $pdo->prepare('SELECT * FROM session WHERE idSession = :id');
    $stateSession->bindValue(':id', $idSession);
    $stateSession->execute();
    $session = $stateSession->fetch();

    $stateUser = $pdo->prepare('SELECT * FROM user WHERE user.idUser=:id');
    $stateUser->bindValue(':id', $session['idUser']);
    $stateUser->execute();
    $user = $stateUser->fetch();
}

if ((int) $idStyle > 5) {
    header('location: ./');
} else if ($idStyle >= 1) {
    if ($idSession) {
        $likeVerify = $pdo->prepare('SELECT * FROM lister, likes 
        WHERE likes.idList = lister.idList
        AND likes.idUser = :user');
        $likeVerify->bindValue('user', $user['idUser']);
        $likeVerify->execute();
        $checkLike = $likeVerify->fetchAll();

        $readLikes = $pdo->prepare('SELECT likes.idUser, lister.idList, likes, idLike, isLike, idStyle
        FROM lister, user, likes
        WHERE lister.idUser = user.idUser
        AND lister.idList = likes.idList
        AND likes.idUser = :user
        AND lister.idStyle = :style
        ORDER BY likes DESC');
        $readLikes->bindValue(':style', $idStyle);
        $readLikes->bindValue(':user', $user['idUser']);
        $readLikes->execute();
        $rl = $readLikes->fetchAll();
    }
    $stateUser = $pdo->prepare('SELECT lister.idUser, nomStyle, lister.idList, idArtiste1, likes, pseudoUser
    FROM lister, user, style
    WHERE lister.idUser = user.idUser
    AND lister.idStyle = style.idStyle
    AND lister.idStyle = :style
    ORDER BY likes DESC');
    $stateUser->bindValue(':style', $idStyle);
    $stateUser->execute();
    $res = $stateUser->fetchAll();

    $stateRead1 = $pdo->prepare('SELECT 
    ordre1, idArtiste1, a1.nomArtiste AS nomArtiste1, a1.prenomArtiste AS prenomArtiste1, l1.morceau AS morceau1,
    ordre2, idArtiste2, a2.nomArtiste AS nomArtiste2, a2.prenomArtiste AS prenomArtiste2, l2.morceau AS morceau2,
    ordre3, idArtiste3, a3.nomArtiste AS nomArtiste3, a3.prenomArtiste AS prenomArtiste3, l3.morceau AS morceau3,
    ordre4, idArtiste4, a4.nomArtiste AS nomArtiste4, a4.prenomArtiste AS prenomArtiste4, l4.morceau AS morceau4,
    ordre5, idArtiste5, a5.nomArtiste AS nomArtiste5, a5.prenomArtiste AS prenomArtiste5, l5.morceau AS morceau5,
    lister.idList, pseudoUser, lister.idStyle
    FROM lister, user,
    artiste AS a1, liens AS l1, 
    artiste AS a2, liens AS l2,
    artiste AS a3, liens AS l3,
    artiste AS a4, liens AS l4,
    artiste AS a5, liens AS l5
    WHERE user.idUser = lister.idUser
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
    AND lister.idStyle = :style
    ORDER BY likes DESC');
    $stateRead1->bindValue(':style', $idStyle);
    $stateRead1->execute();
    $res1 = $stateRead1->fetchAll();


    $stateLister = $pdo->prepare('SELECT COUNT(*) as nbr FROM lister');
    $stateLister->execute();
    $nbr = $stateLister->fetch();
} else {
    if ($idSession) {
        $likeVerify = $pdo->prepare('SELECT * FROM lister, likes 
        WHERE likes.idList = lister.idList
        AND likes.idUser = :user');
        $likeVerify->bindValue('user', $user['idUser']);
        $likeVerify->execute();
        $checkLike = $likeVerify->fetchAll();

        $readLikes = $pdo->prepare('SELECT likes.idUser, lister.idList, likes, idLike, isLike
        FROM lister, user, likes
        WHERE lister.idUser = user.idUser
        AND lister.idList = likes.idList
        AND likes.idUser = :user
        ORDER BY likes DESC');
        $readLikes->bindValue(':user', $user['idUser']);
        $readLikes->execute();
        $rl = $readLikes->fetchAll();
    }
    $stateUser = $pdo->prepare('SELECT lister.idUser, nomStyle, lister.idList, idArtiste1, likes, pseudoUser
    FROM lister, user, style
    WHERE lister.idUser = user.idUser
    AND lister.idStyle = style.idStyle
    ORDER BY likes DESC');
    $stateUser->execute();
    $res = $stateUser->fetchAll();

    $stateRead1 = $pdo->prepare('SELECT 
    ordre1, idArtiste1, a1.nomArtiste AS nomArtiste1, a1.prenomArtiste AS prenomArtiste1, l1.morceau AS morceau1,
    ordre2, idArtiste2, a2.nomArtiste AS nomArtiste2, a2.prenomArtiste AS prenomArtiste2, l2.morceau AS morceau2,
    ordre3, idArtiste3, a3.nomArtiste AS nomArtiste3, a3.prenomArtiste AS prenomArtiste3, l3.morceau AS morceau3,
    ordre4, idArtiste4, a4.nomArtiste AS nomArtiste4, a4.prenomArtiste AS prenomArtiste4, l4.morceau AS morceau4,
    ordre5, idArtiste5, a5.nomArtiste AS nomArtiste5, a5.prenomArtiste AS prenomArtiste5, l5.morceau AS morceau5,
    lister.idList, pseudoUser
    FROM lister, user,
    artiste AS a1, liens AS l1, 
    artiste AS a2, liens AS l2,
    artiste AS a3, liens AS l3,
    artiste AS a4, liens AS l4,
    artiste AS a5, liens AS l5
    WHERE user.idUser = lister.idUser
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
    ORDER BY likes DESC');
    $stateRead1->execute();
    $res1 = $stateRead1->fetchAll();

    $stateLister = $pdo->prepare('SELECT COUNT(*) as nbr FROM lister');
    $stateLister->execute();
    $nbr = $stateLister->fetch();
}
?>
</pre>
<!DOCTYPE html>
<html lang="fr">
<?php require_once './shared/head.php' ?>

<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="main">
            <?php require_once './shared/topbar.php' ?>

            <div class="new">
                <?php for ($r = 0; $r < $nbr['nbr']; $r++) : ?>
                    <div class="list">
                        <div class="headList">
                            <h1><?= $res1[$r]['pseudoUser'] ?></h1>
                            <?php if (!$idSession) { ?>
                                <a href="./login.php">
                                    <img src="./css/img_like&btn/bass-guitar (2).png" alt="" width="35px" height="35px"><?= $res[$r]['likes'] ?>
                                </a>
                            <?php } ?>
                            <?php if ($idSession) { ?>
                                <?php if ($checkLike = 0) { ?>
                                    <a href="./likes_systeme/likes.php" ?idUser=" . $user['idUser'] . " &idList=" . $res[$r]['idList'] ?>">
                                        <img src="./css/img_like&btn/bass-guitar.png" alt="" width="30px" height="30px"><?= $res[$r]['likes'] ?>
                                    </a>
                                <?php } ?>
                                <?php if (empty($rl[$r]['idList']) != empty($res[$r]['idList'])) { ?>
                                    <a href="./likes_systeme/likes.php<?= "?idUser=" . $user['idUser'] . "&idList=" . $res[$r]['idList'] ?>">
                                        <img src="./css/img_like&btn/bass-guitar.png" alt="" width="30px" height="30px"><?= $res[$r]['likes'] ?>
                                    </a>
                                <?php } else if ($rl[$r]['idList'] === $res[$r]['idList'] && $rl[$r]['isLike'] === 0) { ?>
                                    <a href="./likes_systeme/likes.php<?= "?idUser=" . $user['idUser'] . "&idList=" . $res[$r]['idList'] ?>">
                                        <img src="./css/img_like&btn/bass-guitar.png" alt="" width="30px" height="30px"><?= $res[$r]['likes'] ?>
                                    </a>
                                <?php } else if ($rl[$r]['idList'] === $res[$r]['idList'] && $rl[$r]['isLike'] === 1) { ?>
                                    <a href="./likes_systeme/unlikes.php<?= "?idUser=" . $user['idUser'] . "&idList=" . $res[$r]['idList'] ?>">
                                        <img src="./css/img_like&btn/bass-guitar (1).png" alt="" width="30px" height="30px"><?= $res[$r]['likes'] ?>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <a href="./resume.php<?= "?idList=" .  $res[$r]['idList'] . "&idArtiste1=" . $res1[$r]['idArtiste1'] ?>">
                            <h2>(<?= $res[$r]['nomStyle'] ?>)</h2>
                            <ul>
                                <li><?= $res1[$r]['ordre1'] . ' - ' . $res1[$r]['prenomArtiste1'] . " " . $res1[$r]['nomArtiste1'] . " : " . $res1[$r]['morceau1'] ?></li>
                                <li><?= $res1[$r]['ordre2'] . ' - ' . $res1[$r]['prenomArtiste2'] . " " . $res1[$r]['nomArtiste2'] . " : " . $res1[$r]['morceau2'] ?></li>
                                <li><?= $res1[$r]['ordre3'] . ' - ' . $res1[$r]['prenomArtiste3'] . " " . $res1[$r]['nomArtiste3'] . " : " . $res1[$r]['morceau3'] ?></li>
                                <li><?= $res1[$r]['ordre4'] . ' - ' . $res1[$r]['prenomArtiste4'] . " " . $res1[$r]['nomArtiste4'] . " : " . $res1[$r]['morceau4'] ?></li>
                                <li><?= $res1[$r]['ordre5'] . ' - ' . $res1[$r]['prenomArtiste5'] . " " . $res1[$r]['nomArtiste5'] . " : " . $res1[$r]['morceau5'] ?></li>
                            </ul>
                        </a>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <?php require_once './shared/footer.php' ?>
</body>

</html>