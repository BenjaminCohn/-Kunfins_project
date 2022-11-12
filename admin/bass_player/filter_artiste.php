<?php

$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

$artiste = $_GET['artiste'] ?? "";
$groupe = $_GET['groupeArtiste'] ?? "";
$style = $_GET['nomStyle'] ?? "";

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

if (empty($prenomMatch) && empty($nomMatch) && $groupe === "" && $style === "") {
    $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style WHERE style.idStyle = artiste.idStyle ORDER BY prenomArtiste');
    $stateReadArtiste->execute();
    $allArtiste = $stateReadArtiste->fetchAll();
} else {
    if (empty($prenomMatch) && empty($nomMatch) && $groupe === "") {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle 
            AND nomStyle LIKE :style
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':style', "%$style%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if (empty($prenomMatch) && empty($nomMatch) && $style === "") {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle 
            AND groupeArtiste LIKE :groupe
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':groupe', "%$groupe%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if (empty($prenomMatch) && $groupe === "" && $style === "") {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle 
            AND nomArtiste LIKE :nom
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':nom', "%$artiste%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if (empty($nomMatch) && $groupe === "" && $style === "") {
        $stateReadArtiste = $pdo->prepare("SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle 
            AND prenomArtiste LIKE :prenom
            ORDER BY prenomArtiste");
        $stateReadArtiste->bindvalue(':prenom', "%$artiste%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if (empty($prenomMatch) && empty($nomMatch)) {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle
            AND groupeArtiste LIKE :groupe
            AND nomStyle LIKE :style 
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':groupe', "%$groupe%");
        $stateReadArtiste->bindvalue(':style', "%$style%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if (empty($prenomMatch) && $style === "") {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle 
            AND nomArtiste LIKE :nom
            AND groupeArtiste LIKE :groupe
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':nom', "%$artiste%");
        $stateReadArtiste->bindvalue(':groupe', "%$groupe%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if (empty($prenomMatch) && $groupe === "") {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle 
            AND nomArtiste LIKE :nom
            AND nomStyle LIKE :style
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':nom', "%$artiste%");
        $stateReadArtiste->bindvalue(':style', "%$style%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if (empty($nomMatch) && $groupe === "") {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle 
            AND prenomArtiste LIKE :prenom
            AND nomStyle LIKE :style
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':prenom', "%$artiste%");
        $stateReadArtiste->bindvalue(':style', "%$style%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if (empty($nomMatch) && $style === "") {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle 
            AND prenomArtiste LIKE :prenom
            AND groupeArtiste LIKE :groupe
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':prenom', "%$artiste%");
        $stateReadArtiste->bindvalue(':groupe', "%$groupe%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if ($groupe === "" && $style === "") {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE prenomArtiste LIKE :prenom
            OR nomArtiste LIKE :nom
            AND style.idStyle = artiste.idStyle 
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':prenom', "%$artiste%");
        $stateReadArtiste->bindvalue(':nom', "%$artiste%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if (empty($prenomMatch)) {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle 
            AND nomArtiste LIKE :nom
            AND groupeArtiste LIKE :groupe
            AND nomStyle LIKE :style
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':nom', "%$artiste%");
        $stateReadArtiste->bindvalue(':groupe', "%$groupe%");
        $stateReadArtiste->bindvalue(':style', "%$style%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else if (empty($nomMatch)) {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE style.idStyle = artiste.idStyle 
            AND prenomArtiste LIKE :prenom
            AND groupeArtiste LIKE :groupe
            AND nomStyle LIKE :style
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':prenom', "%$artiste%");
        $stateReadArtiste->bindvalue(':groupe', "%$groupe%");
        $stateReadArtiste->bindvalue(':style', "%$style%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    } else {
        $stateReadArtiste = $pdo->prepare('SELECT idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style 
            WHERE prenomArtiste LIKE :prenom
            OR nomArtiste LIKE :nom
            AND groupeArtiste LIKE :groupe
            AND nomStyle LIKE :style
            AND style.idStyle = artiste.idStyle 
            ORDER BY prenomArtiste');
        $stateReadArtiste->bindvalue(':prenom', "%$artiste%");
        $stateReadArtiste->bindvalue(':nom', "%$artiste%");
        $stateReadArtiste->bindvalue(':groupe', "%$groupe%");
        $stateReadArtiste->bindvalue(':style', "%$style%");
        $stateReadArtiste->execute();
        $allArtiste = $stateReadArtiste->fetchAll();
    }
}
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
                    <th>BASSISTE <input name="artiste" type="text" placeholder="filtre" value="<?= $artiste === null ? null : $artiste ?>"></th>
                    <th>GROUPE <input name="groupeArtiste" type="text" placeholder="filtre" value="<?= $groupe === null ? null : $groupe ?>"></th>
                    <th>STYLE <input name="nomStyle" type="text" placeholder="filtre" value="<?= $style === null ? null : $style ?>"></th>
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
                    <td><a href="./update_bp.php?idArtiste=<?= $aa['idArtiste'] ?>"><button class="btn btn-success">UPDATE</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>