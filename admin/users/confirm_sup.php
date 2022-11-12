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

$stateDelete = $pdo->prepare('DELETE FROM user WHERE idUser = :id');
$stateDelete->bindValue(':id', $idUser);
$stateDelete->execute();
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="bg-success bg-gradient p-5 bg-opacity-75">
    <?php require_once '../shared_admin/header.php' ?>
    <h2>L'utilisateur a été supprimé</h2>
    <h3>Retour à la page user <a href="../users/admin_user.php">ici</a></h3>

</body>

</html>