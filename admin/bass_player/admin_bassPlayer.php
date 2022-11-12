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

$stateReadArtiste = $pdo->prepare('SELECT artiste.idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style WHERE style.idStyle = artiste.idStyle ORDER BY prenomArtiste');
$stateReadArtiste->execute();
$allArtiste = $stateReadArtiste->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <a href="./new_bp.php"><button class="btn btn-outline-success mb-3">Nouveau bassiste</button></a>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <form action="./filter_artiste.php" method="GET">
                    <button class="btn btn-success mb-3">Search</button>
                    <th>BASSISTE <input name="artiste" type="text" placeholder="filtre"></th>
                    <th>GROUPE <input name="groupeArtiste" type="text" placeholder="filtre"></th>
                    <th>STYLE <input name="nomStyle" type="text" placeholder="filtre"></th>
                    <th>MODIFIER</th>
                </form>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($allArtiste as $aa) { ?>
                <tr>
                    <th><a href="./resume_bp.php?idArtiste=<?= $aa['idArtiste'] ?>"><?= $aa['prenomArtiste'] . " " . $aa['nomArtiste'] ?></a></th>
                    <td><?= $aa['groupeArtiste'] ? $aa["groupeArtiste"] : "Artiste indépendant"  ?></td>
                    <td><?= $aa['nomStyle'] ?></td>
                    <td>
                        <a href="./update_bp.php<?= '?idArtiste=' . $aa['idArtiste'] ?>"><button class="btn btn-success">UPDATE</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>