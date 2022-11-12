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

$cat = $_GET['cat'] ?? '';
$nom = $_GET['nom'] ?? '';
$mrq = $_GET['mrq'] ?? '';

if ($cat === '' && $nom === '' && $mrq === '') {
    $stateReadEquip = $pdo->prepare('SELECT matos.idCat, categorie.idCat, nomCat, idMatos, nomMatos, mrqMatos FROM matos, categorie 
        WHERE matos.idCat = categorie.idCat
        ORDER BY nomCat, nomMatos');
    $stateReadEquip->execute();
    $allEquip = $stateReadEquip->fetchAll();
} else {
    if ($nom === '' && $mrq === '') {
        $stateReadEquip = $pdo->prepare('SELECT matos.idCat, categorie.idCat, nomCat, idMatos, nomMatos, mrqMatos FROM matos, categorie 
            WHERE matos.idCat = categorie.idCat
            AND nomCat LIKE :nomCat
            ORDER BY nomCat, nomMatos');
        $stateReadEquip->bindvalue(':nomCat', "%$cat%");
        $stateReadEquip->execute();
        $allEquip = $stateReadEquip->fetchAll();
    } else if ($cat === '' && $mrq === '') {
        $stateReadEquip = $pdo->prepare('SELECT matos.idCat, categorie.idCat, nomCat, idMatos, nomMatos, mrqMatos FROM matos, categorie 
            WHERE matos.idCat = categorie.idCat
            AND nomMatos LIKE :nom
            ORDER BY nomCat, nomMatos');
        $stateReadEquip->bindvalue(':nom', "%$nom%");
        $stateReadEquip->execute();
        $allEquip = $stateReadEquip->fetchAll();
    } else if ($cat === '' && $nom === '') {
        $stateReadEquip = $pdo->prepare('SELECT matos.idCat, categorie.idCat, nomCat, idMatos, nomMatos, mrqMatos FROM matos, categorie 
            WHERE matos.idCat = categorie.idCat
            AND mrqMatos LIKE :mrq
            ORDER BY nomCat, nomMatos');
        $stateReadEquip->bindvalue(':mrq', "%$mrq%");
        $stateReadEquip->execute();
        $allEquip = $stateReadEquip->fetchAll();
    } else if ($cat === '') {
        $stateReadEquip = $pdo->prepare('SELECT matos.idCat, categorie.idCat, nomCat, idMatos, nomMatos, mrqMatos FROM matos, categorie 
            WHERE matos.idCat = categorie.idCat
            AND nomMatos LIKE :nom
            AND mrqMatos LIKE :mrq
            ORDER BY nomCat, nomMatos');
        $stateReadEquip->bindvalue(':nom', "%$nom%");
        $stateReadEquip->bindvalue(':mrq', "%$mrq%");
        $stateReadEquip->execute();
        $allEquip = $stateReadEquip->fetchAll();
    } else if ($nom === '') {
        $stateReadEquip = $pdo->prepare('SELECT matos.idCat, categorie.idCat, nomCat, idMatos, nomMatos, mrqMatos FROM matos, categorie 
            WHERE matos.idCat = categorie.idCat
            AND nomCat LIKE :nomCat
            AND mrqMatos LIKE :mrq
            ORDER BY nomCat, nomMatos');
        $stateReadEquip->bindvalue(':nomCat', "%$cat%");
        $stateReadEquip->bindvalue(':mrq', "%$mrq%");
        $stateReadEquip->execute();
        $allEquip = $stateReadEquip->fetchAll();
    } else if ($mrq === '') {
        $stateReadEquip = $pdo->prepare('SELECT matos.idCat, categorie.idCat, nomCat, idMatos, nomMatos, mrqMatos FROM matos, categorie 
            WHERE matos.idCat = categorie.idCat
            AND nomCat LIKE :nomCat
            AND nomMatos LIKE :nom
            ORDER BY nomCat, nomMatos');
        $stateReadEquip->bindvalue(':nomCat', "%$cat%");
        $stateReadEquip->bindvalue(':nom', "%$nom%");
        $stateReadEquip->execute();
        $allEquip = $stateReadEquip->fetchAll();
    } else {
        $stateReadEquip = $pdo->prepare('SELECT matos.idCat, categorie.idCat, nomCat, idMatos, nomMatos, mrqMatos FROM matos, categorie 
            WHERE matos.idCat = categorie.idCat
            AND nomCat LIKE :nomCat
            AND nomMatos LIKE :nom
            AND mrqMatos LIKE :mrq
            ORDER BY nomCat, nomMatos');
        $stateReadEquip->bindvalue(':nomCat', "%$cat%");
        $stateReadEquip->bindvalue(':nom', "%$nom%");
        $stateReadEquip->bindvalue(':mrq', "%$mrq%");
        $stateReadEquip->execute();
        $allEquip = $stateReadEquip->fetchAll();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <a href="./new_equip.php"><button class="btn btn-outline-info mb-3">Nouveau equipboard</button></a>
    <a href="./new_cat.php"><button class="btn btn-outline-info mb-3">Nouvelle catégorie</button></a>


    <table class="table table-info table-striped list-wrapper">
        <thead>
            <tr>
                <form action="./filter_equip.php" method="GET">
                    <button class="btn btn-info mb-3">Search</button>
                    <th>CATEGORIE <input placeholder="filtre" type="text" name="cat"></th>
                    <th>NOM <input placeholder="filtre" type="text" name="nom"></th>
                    <th>MARQUE <input placeholder="filtre" type="text" name="mrq"></th>
                    <th>MODIFIER</th>
                </form>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($allEquip as $ae) { ?>
                <tr class="list-item">
                    <th><?= $ae['nomCat'] ?></th>
                    <th><?= $ae['nomMatos'] ?></th>
                    <td><?= $ae['mrqMatos'] ?></td>
                    <td>
                        <a href="./update_equip.php?idMatos=<?= $ae['idMatos'] ?>">
                            <button class="btn btn-info">UPDATE</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>


</html>