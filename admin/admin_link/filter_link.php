<?php
$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

$morceau = $_GET['titre'] ?? "";
$artiste = $_GET['artiste'] ?? "";

// ces 2 requetes cherchent si la donnée entrée dans le filtre artiste match avec la colonne prenom ou nom
$statePrenom = $pdo->prepare('SELECT prenomArtiste FROM artiste WHERE prenomArtiste LIKE :artiste');
$statePrenom->bindvalue(':artiste', "%$artiste%");
$statePrenom->execute();
$prenomMatch = $statePrenom->fetchAll();

$stateNom = $pdo->prepare('SELECT nomArtiste FROM artiste WHERE nomArtiste LIKE :artiste');
$stateNom->bindvalue(':artiste', "%$artiste%");
$stateNom->execute();
$nomMatch = $stateNom->fetchAll();

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

if ($morceau === "" && $artiste === "") {
    $stateReadLink = $pdo->prepare('SELECT liens.idArtiste, morceau, prenomArtiste, nomArtiste, youtube, tab FROM artiste, liens WHERE artiste.idArtiste = liens.idArtiste ORDER BY morceau');
    $stateReadLink->execute();
    $allLink = $stateReadLink->fetchAll();
} else {
    if ($artiste === "") {
        $stateReadLink = $pdo->prepare('SELECT liens.idArtiste, morceau, prenomArtiste, nomArtiste, youtube, tab FROM artiste, liens 
        WHERE artiste.idArtiste = liens.idArtiste 
        AND morceau LIKE :titre
        ORDER BY morceau');
        $stateReadLink->bindvalue(':titre', "%$morceau%");
        $stateReadLink->execute();
        $allLink = $stateReadLink->fetchAll();

        var_dump("test 1");
    } else if ($morceau === "" && empty($prenomMatch)) {
        $stateReadLink = $pdo->prepare('SELECT liens.idArtiste, morceau, prenomArtiste, nomArtiste, youtube, tab FROM artiste, liens 
            WHERE artiste.idArtiste = liens.idArtiste 
            AND nomArtiste LIKE :artiste
            ORDER BY morceau');
        $stateReadLink->bindvalue(':artiste', "%$artiste%");
        $stateReadLink->execute();
        $allLink = $stateReadLink->fetchAll();

        var_dump("test 2");
    } else if ($morceau === "" && empty($nomMatch)) {
        $stateReadLink = $pdo->prepare('SELECT liens.idArtiste, morceau, prenomArtiste, nomArtiste, youtube, tab FROM artiste, liens 
            WHERE artiste.idArtiste = liens.idArtiste 
            AND prenomArtiste LIKE :artiste
            ORDER BY morceau');
        $stateReadLink->bindvalue(':artiste', "%$artiste%");
        $stateReadLink->execute();
        $allLink = $stateReadLink->fetchAll();

        var_dump("test 3");
    } else {
        if (empty($prenomMatch)) {
            $stateReadLink = $pdo->prepare('SELECT liens.idArtiste, morceau, prenomArtiste, nomArtiste, youtube, tab FROM artiste, liens 
            WHERE artiste.idArtiste = liens.idArtiste 
            AND morceau LIKE :titre
            AND nomArtiste LIKE :artiste
            ORDER BY morceau');
            $stateReadLink->bindvalue(':titre', "%$morceau%");
            $stateReadLink->bindvalue(':artiste', "%$artiste%");
            $stateReadLink->execute();
            $allLink = $stateReadLink->fetchAll();

            var_dump("test 4");
        } else if (empty($nomMatch)) {
            $stateReadLink = $pdo->prepare('SELECT liens.idArtiste, morceau, prenomArtiste, nomArtiste, youtube, tab FROM artiste, liens 
            WHERE artiste.idArtiste = liens.idArtiste 
            AND morceau LIKE :titre
            AND prenomArtiste LIKE :artiste
            ORDER BY morceau');
            $stateReadLink->bindvalue(':titre', "%$morceau%");
            $stateReadLink->bindvalue(':artiste', "%$artiste%");
            $stateReadLink->execute();
            $allLink = $stateReadLink->fetchAll();

            var_dump("test 5");
        }
    }
}
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
                        <a href="./update_link.php?idArtiste=<?= $al['idArtiste'] ?>"><button class="btn btn-warning">UPDATE</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>