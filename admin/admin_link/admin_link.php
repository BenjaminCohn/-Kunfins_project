<?php
$pdo = require_once('../shared_admin/db.php');

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
    header('location: ../index.php');
}

$stateReadLink = $pdo->prepare('SELECT liens.idArtiste, morceau, youtube, tab, prenomArtiste, nomArtiste FROM artiste, liens WHERE artiste.idArtiste = liens.idArtiste ORDER BY morceau');
$stateReadLink->execute();
$allLink = $stateReadLink->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <a href="./new_link.php"><button class="btn btn-outline-warning mb-3">Nouveau lien</button></a>

    <table class="table table-warning table-striped">
        <thead>
            <tr>
                <form action="./filter_link.php" method="GET">
                    <button class="btn btn-warning mb-3">Search</button>
                    <th>TITRE <input name="titre" type="text" placeholder="filtre"></th>
                    <th>BASS PLAYER <input name="artiste" type="text" placeholder="filtre"></th>
                    <th>YOUTUBE</th>
                    <th>TABLATURE</th>
                    <th>MODIFIER</th>
                </form>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($allLink as $al) { ?>
                <tr>
                    <th><?= $al['morceau'] ?></th>
                    <td><?= $al['prenomArtiste'] . " " . $al['nomArtiste'] ?></td>
                    <td><a href="<?= $al['youtube'] ?>" target="_blank"><?= $al['youtube'] ?></a></td>
                    <td><a href="<?= $al['tab'] ?>" target="_blank"><?= $al['tab'] ?></a></td>
                    <td>
                        <a href="./update_link.php?idArtiste=<?= $al['idArtiste'] ?>">
                            <button class="btn btn-warning">UPDATE</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>