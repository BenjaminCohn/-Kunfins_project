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

$stateReadEquip = $pdo->prepare('SELECT matos.idCat, categorie.idCat, nomCat, idMatos, nomMatos, mrqMatos FROM matos, categorie 
    WHERE matos.idCat = categorie.idCat
    ORDER BY nomCat, nomMatos');
$stateReadEquip->execute();
$allEquip = $stateReadEquip->fetchAll();
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