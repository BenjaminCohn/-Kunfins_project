<?php

$pdo = require_once('../shared_admin/db.php');

$idUser = $_GET['idUser'];

$idSession = $_COOKIE['session'] ?? false;

if ($idSession) {
    $stateSession = $pdo->prepare('SELECT * FROM session WHERE idSession = :id');
    $stateSession->bindValue(':id', $idSession);
    $stateSession->execute();
    $session = $stateSession->fetch();

    $stateUser = $pdo->prepare('SELECT * FROM user WHERE idUser=:id AND roleAdmin = 1 OR roleModo = 1');
    $stateUser->bindValue(':id', $session['idUser']);
    $stateUser->execute();
    $user = $stateUser->fetch();
} else {
    $user = null;
    header('location: ./admin.php');
}

$readUser = $pdo->prepare('SELECT * FROM user WHERE idUser = :id');
$readUser->bindValue(':id', $idUser);
$readUser->execute();
$resume_user = $readUser->fetch();

$readList = $pdo->prepare('SELECT nomStyle, idUser, likes,
    ordre1, idArtiste1, a1.nomArtiste AS nomArtiste1, a1.prenomArtiste AS prenomArtiste1, l1.morceau AS morceau1,
    ordre2, idArtiste2, a2.nomArtiste AS nomArtiste2, a2.prenomArtiste AS prenomArtiste2, l2.morceau AS morceau2,
    ordre3, idArtiste3, a3.nomArtiste AS nomArtiste3, a3.prenomArtiste AS prenomArtiste3, l3.morceau AS morceau3,
    ordre4, idArtiste4, a4.nomArtiste AS nomArtiste4, a4.prenomArtiste AS prenomArtiste4, l4.morceau AS morceau4,
    ordre5, idArtiste5, a5.nomArtiste AS nomArtiste5, a5.prenomArtiste AS prenomArtiste5, l5.morceau AS morceau5
    FROM lister, style,
    artiste AS a1, liens AS l1, 
    artiste AS a2, liens AS l2,
    artiste AS a3, liens AS l3,
    artiste AS a4, liens AS l4,
    artiste AS a5, liens AS l5
    WHERE idUser = :id
    AND lister.idStyle = style.idStyle
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
    ');
$readList->bindValue(':id', $idUser);
$readList->execute();
$resume_List = $readList->fetchAll();

$stateLister = $pdo->prepare('SELECT COUNT(*) as nbr FROM lister WHERE idUser = :id');
$stateLister->bindValue(':id', $idUser);
$stateLister->execute();
$nbr = $stateLister->fetch();

$stateread = $pdo->prepare('SELECT * FROM user ORDER BY user.idUser DESC');
$stateread->execute();
$res_users = $stateread->fetchAll();

$now = date('j/m/Y H:i:s');

$stateBan = $pdo->prepare('SELECT idBan, DATE_FORMAT(date, "%d/%m/%y - %H:%i") as date, commentaire FROM ban WHERE idUserBan = :id AND date > :now');
$stateBan->bindvalue(':id', $idUser);
$stateBan->bindvalue(':now', $now);
$stateBan->execute();
$userBan = $stateBan->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_input = filter_input_array(INPUT_POST, [
        "idBan" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);
    $ban = $_input['idBan'];

    $stateDeleteBan = $pdo->prepare('DELETE FROM ban WHERE idBan = :ban');
    $stateDeleteBan->bindvalue(':ban', $ban);
    $stateDeleteBan->execute();

    header('location: ./resume_user.php?idUser=' . $idUser);
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="d-flex justify-content-center">
        <div class="card border-primary bg-secondary mb-3" style="max-width: 32rem;">
            <div class="card-header">
                <h2><?= $resume_user['pseudoUser'] ?></h2>
                <h3><?= $resume_user['nomUser'] . " " . $resume_user['prenomUser'] ?></h3>
            </div>
            <div class="card-body">
                <?php if (!$userBan === false) { ?>
                    <?php foreach ($userBan as $ub) { ?>
                        <form action="./resume_user.php<?= '?idUser=' . $idUser ?>" class="form" action="deleteBan" method="POST">
                            <input name="idBan" value="<?= $ub['idBan'] ?>" style="visibility: hidden;">
                            <h5><?= $ub["date"] ?></h5>
                            <h5>Motif : <?= $ub["commentaire"] ?></h5>
                            <button class="btn btn-primary">Supprimer</button>
                        </form>
                    <?php } ?>
                <?php } ?>

                <div class="card-header">
                    <?php foreach ($resume_List as $rl) { ?>
                        <h2><?= $rl['nomStyle'] . " : " . $rl['likes'] . " " . "likes" ?></h2>
                </div>
                <div class="card-body">
                    <ul>
                        <li><?= $rl['ordre1'] . ' ' . $rl['prenomArtiste1'] . " " . $rl['nomArtiste1'] . " : " . $rl['morceau1'] ?></li>
                        <li><?= $rl['ordre2'] . ' ' . $rl['prenomArtiste2'] . " " . $rl['nomArtiste2'] . " : " . $rl['morceau2'] ?></li>
                        <li><?= $rl['ordre3'] . ' ' . $rl['prenomArtiste3'] . " " . $rl['nomArtiste3'] . " : " . $rl['morceau3'] ?></li>
                        <li><?= $rl['ordre4'] . ' ' . $rl['prenomArtiste4'] . " " . $rl['nomArtiste4'] . " : " . $rl['morceau4'] ?></li>
                        <li><?= $rl['ordre5'] . ' ' . $rl['prenomArtiste5'] . " " . $rl['nomArtiste5'] . " : " . $rl['morceau5'] ?></li>
                    </ul>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>