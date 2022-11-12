<?php

$pdo = require_once "../shared/db.php";

$style = (int) $_GET['style'] ?? null;
$artiste1 = $_GET['artiste1'] ?? null;
$artiste2 = $_GET['artiste2'] ?? null;
$artiste3 = $_GET['artiste3'] ?? null;
$artiste4 = $_GET['artiste4'] ?? null;
$artiste5 = $_GET['artiste5'] ?? null;

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
    header('Location: ./login.php');
}

if ($style == 1 || $style == 2 || $style == 3 || $style == 4 || $style == 5) {
    $stateRead = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste 
    FROM `artiste` WHERE idStyle = :idStyle');
    $stateRead->bindValue(':idStyle', $style);
    $stateRead->execute();
    $res1 = $stateRead->fetchAll();

    if ($artiste1) {
        $stateRead = $pdo->prepare('SELECT * FROM `liens` WHERE idArtiste = :id');
        $stateRead->bindValue(':id', $artiste1);
        $stateRead->execute();
        $mor1 = $stateRead->fetchAll();

        $stateRead2 = $pdo->prepare('SELECT prenomArtiste, nomArtiste FROM `artiste` WHERE idArtiste = :idArtiste');
        $stateRead2->bindValue(':idArtiste', $artiste1);
        $stateRead2->execute();
        $res1 = $stateRead2->fetchAll();
    }

    if ($artiste2) {
        $stateRead = $pdo->prepare('SELECT * FROM `liens` WHERE idArtiste = :id');
        $stateRead->bindValue(':id', $artiste2);
        $stateRead->execute();
        $mor2 = $stateRead->fetchAll();

        $stateRead2 = $pdo->prepare('SELECT prenomArtiste, nomArtiste FROM `artiste` WHERE idArtiste = :idArtiste');
        $stateRead2->bindValue(':idArtiste', $artiste2);
        $stateRead2->execute();
        $res2 = $stateRead2->fetchAll();
    }

    if ($artiste3) {
        $stateRead = $pdo->prepare('SELECT * FROM `liens` WHERE idArtiste = :id');
        $stateRead->bindValue(':id', $artiste3);
        $stateRead->execute();
        $mor3 = $stateRead->fetchAll();

        $stateRead2 = $pdo->prepare('SELECT prenomArtiste, nomArtiste FROM `artiste` WHERE idArtiste = :idArtiste');
        $stateRead2->bindValue(':idArtiste', $artiste3);
        $stateRead2->execute();
        $res3 = $stateRead2->fetchAll();
    }

    if ($artiste4) {
        $stateRead = $pdo->prepare('SELECT * FROM `liens` WHERE idArtiste = :id');
        $stateRead->bindValue(':id', $artiste4);
        $stateRead->execute();
        $mor4 = $stateRead->fetchAll();

        $stateRead2 = $pdo->prepare('SELECT prenomArtiste, nomArtiste FROM `artiste` WHERE idArtiste = :idArtiste');
        $stateRead2->bindValue(':idArtiste', $artiste4);
        $stateRead2->execute();
        $res4 = $stateRead2->fetchAll();
    }

    if ($artiste5) {
        $stateRead = $pdo->prepare('SELECT * FROM `liens` WHERE idArtiste = :id');
        $stateRead->bindValue(':id', $artiste5);
        $stateRead->execute();
        $mor5 = $stateRead->fetchAll();

        $stateRead2 = $pdo->prepare('SELECT prenomArtiste, nomArtiste FROM `artiste` WHERE idArtiste = :idArtiste');
        $stateRead2->bindValue(':idArtiste', $artiste5);
        $stateRead2->execute();
        $res5 = $stateRead2->fetchAll();
    }
} else {
    header('Location: ../Creator/selectStyle.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<?php
require_once  '../shared/head.php'
?>

<body>
    <div class="container">
        <?php
        require_once '../shared/header.php'
        ?>

        <div class="main">
            <?php
            require_once '../shared/topbar.php'
            ?>

            <div class="tuto">
                <span>
                    C'est ici que vous sélectionné en première étape vos artistes puis le morceau qui vous semble être le plus approprié - <strong>ATTENTION</strong> - vous ne pouvez pas avoir 2 fois (et plus) le même artiste sur la meme liste et vous devez choisir chaque morceau.
                </span>
            </div>

            <div class="creator">
                <div class="tl">

                    <?php if ($artiste1 && $artiste2 && $artiste3 && $artiste4 && $artiste5) : ?>
                        <div class="form">
                            <h2>1</h2>
                            <?php foreach ($res1 as $r1) { ?>
                                <input value="<?= $r1['prenomArtiste'] . " " . $r1['nomArtiste'] ?>" disabled>
                            <?php }; ?>

                            <h2>2</h2>
                            <?php foreach ($res2 as $r1) { ?>
                                <input value="<?= $r1['prenomArtiste'] . " " . $r1['nomArtiste'] ?>" disabled>
                            <?php }; ?>

                            <h2>3</h2>
                            <?php foreach ($res3 as $r1) { ?>
                                <input value="<?= $r1['prenomArtiste'] . " " . $r1['nomArtiste'] ?>" disabled>
                            <?php }; ?>

                            <h2>4</h2>
                            <?php foreach ($res4 as $r1) { ?>
                                <input value="<?= $r1['prenomArtiste'] . " " . $r1['nomArtiste'] ?>" disabled>
                            <?php }; ?>

                            <h2>5</h2>
                            <?php foreach ($res5 as $r1) { ?>
                                <input value="<?= $r1['prenomArtiste'] . " " . $r1['nomArtiste'] ?>" disabled style="margin-bottom: 5px;">
                            <?php }; ?>
                            <a href="javascript:history.go(-1)"><button id="btncreator" class="aleft"><img src="../css/img_like&btn/fleche-vers-le-bas.png" alt="" width="50px" height="50px" class="left"></button></a>
                        </div>

                    <?php else : ?>
                        <form action="./selectS.php" method="GET">
                            <h2>1</h2>
                            <select name="artiste1" id="artisteChosen">
                                <option value="artiste1">Bassiste :</option>
                                <?php foreach ($res1 as $r1) { ?>
                                    <option value=<?= $r1['idArtiste'] . "&style=" . $style ?>><?= $r1['prenomArtiste'] . " " . $r1['nomArtiste'] ?></option>
                                <?php }; ?>
                            </select>

                            <h2>2</h2>
                            <select name="artiste2" id="artisteChosen">
                                <option value="artiste2">Bassiste :</option>
                                <?php foreach ($res1 as $r1) { ?>
                                    <option value=<?= $r1['idArtiste'] . "&style=" . $style ?>><?= $r1['prenomArtiste'] . " " . $r1['nomArtiste'] ?></option>
                                <?php }; ?>
                            </select>

                            <h2>3</h2>
                            <select name="artiste3" id="artisteChosen">
                                <option value="artiste3">Bassiste :</option>
                                <?php foreach ($res1 as $r1) { ?>
                                    <option value=<?= $r1['idArtiste'] . "&style=" . $style ?>><?= $r1['prenomArtiste'] . " " . $r1['nomArtiste'] ?></option>
                                <?php }; ?>
                            </select>

                            <h2>4</h2>
                            <select name="artiste4" id="artisteChosen">
                                <option value="artiste4">Bassiste :</option>
                                <?php foreach ($res1 as $r1) { ?>
                                    <option value=<?= $r1['idArtiste'] . "&style=" . $style ?>><?= $r1['prenomArtiste'] . " " . $r1['nomArtiste'] ?></option>
                                <?php }; ?>
                            </select>

                            <h2>5</h2>
                            <select name="artiste5" id="artisteChosen" style="margin-bottom: 5px;">
                                <option value="artiste5">Bassiste :</option>
                                <?php foreach ($res1 as $r1) { ?>
                                    <option value=<?= $r1['idArtiste'] . "&style=" . $style ?>><?= $r1['prenomArtiste'] . " " . $r1['nomArtiste'] ?></option>
                                <?php }; ?>
                            </select>
                            <button id="btncreator" class="aright"><img src="../css/img_like&btn/fleche-vers-le-bas.png" alt="" width="50px" height="50px" class="right"></button>
                        </form>
                
                    <?php endif; ?>

                    <form class="form" action="./pushChoice.php" method="POST">
                        <?php if ($artiste1 && $artiste2 && $artiste3 && $artiste4 && $artiste5) : ?>
                            <h2>1</h2>
                            <select name="morceau1" id="morceau1">
                                <option value="morceau1">Morceau :</option>
                                <?php foreach ($mor1 as $m2) { ?>
                                    <option value=<?= $m2['idLien'] ?>><?= $m2['morceau'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="style" value=<?= $style ?>>
                            <input type="hidden" name="artiste1" value=<?= $artiste1 ?>>

                            <h2>2</h2>
                            <select name="morceau2" id="morceau2">
                                <option value="morceau2">Morceau :</option>
                                <?php foreach ($mor2 as $m2) { ?>
                                    <option value=<?= $m2['idLien'] ?>><?= $m2['morceau'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="style" value=<?= $style ?>>
                            <input type="hidden" name="artiste2" value=<?= $artiste2 ?>>

                            <h2>3</h2>
                            <select name="morceau3" id="morceau3">
                                <option value="morceau3">Morceau :</option>
                                <?php foreach ($mor3 as $m2) { ?>
                                    <option value=<?= $m2['idLien'] ?>><?= $m2['morceau'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="style" value=<?= $style ?>>
                            <input type="hidden" name="artiste3" value=<?= $artiste3 ?>>

                            <h2>4</h2>
                            <select name="morceau4" id="morceau4">
                                <option value="morceau4">Morceau :</option>
                                <?php foreach ($mor4 as $m2) { ?>
                                    <option value=<?= $m2['idLien'] ?>><?= $m2['morceau'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="style" value=<?= $style ?>>
                            <input type="hidden" name="artiste4" value=<?= $artiste4 ?>>

                            <h2>5</h2>
                            <select name="morceau5" id="morceau5" style="margin-bottom: 5px;">
                                <option value="morceau5">Morceau :</option>
                                <?php foreach ($mor5 as $m2) { ?>
                                    <option value=<?= $m2['idLien'] ?>><?= $m2['morceau'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="style" value=<?= $style ?>>
                            <input type="hidden" name="artiste5" value=<?= $artiste5 ?>>
                            <button id="btncreator" class="aright"><img src="../css/img_like&btn/fleche-vers-le-bas.png" alt="" width="50px" height="50px" class="right"></button>
                    </form>
                <?php endif; ?>

                </div>

            </div>
        </div>

    </div>
    <?php require_once '../shared/footer.php' ?>
</body>

</html>