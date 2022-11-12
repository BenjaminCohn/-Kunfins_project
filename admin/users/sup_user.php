<?php

$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;
$idUser = $_GET['idUser'];

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

$stateRead = $pdo->prepare('SELECT * FROM user WHERE idUser = :id');
$stateRead->bindValue(':id', $idUser);
$stateRead->execute();
$read_user = $stateRead->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="m-5">
        <h2>Vous êtes sur le point de supprimer l'utilisateur <strong>"<?= $read_user['pseudoUser'] ?>" (<?= $read_user['nomUser'] . " " . $read_user['prenomUser'] ?>)</strong></h2>
        <h1>Etes-vous sûr ?</h1>
        <a href="./admin_user.php"><button class="btn btn-primary">NON</button></a>
        <a href="./confirm_sup.php?idUser=<?= $read_user['idUser'] ?>"><button class="btn btn-outline-primary">OUI</button></a>
    </div>

</body>

</html>