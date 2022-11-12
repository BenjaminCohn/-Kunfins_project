<?php

$pdo = require_once "../shared/db.php";

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

$stateRead = $pdo->prepare('SELECT lister.idStyle, style.idStyle, nomStyle, idUser FROM style, lister
WHERE lister.idStyle != style.idStyle
AND idUser = :user');
$stateRead->bindValue(':user', $user['idUser']);
$stateRead->execute();
$res = $stateRead->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared/head.php' ?>

<body>
    <div class="container">
        <?php require_once '../shared/header.php' ?>
        <div class="main">
            <?php require_once '../shared/topbar.php' ?>
            <div class="tuto">
                <span>
                    C'est ici que vous créez vos TOP 5 - <strong>ATTENTION</strong> - vous pouvez créer une seule liste par style (jazz, rock, metal...).
                </span>
            </div>
            <div class="creator">
                <div class="tl">
                    <form action="./creation_TLS.php" method="GET">
                        <h2>Style :</h2>
                        <select name="style" id="style" style="margin: 5px;">
                            <?php foreach ($res as $r) { ?>
                                <option value=<?= $r['idStyle'] ?>><?= $r['nomStyle'] ?></option>
                            <?php }; ?>
                        </select>
                        <button id="btncreator" class="aright"><img class="right" src="../css/img_like&btn/fleche-vers-le-bas.png" alt="" width="50px" height="50px"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once '../shared/footer.php' ?>
</body>

</html>