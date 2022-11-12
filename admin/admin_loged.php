<?php

$pdo = require_once('../shared/db.php');

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

?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once './shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">

    <div class="d-flex justify-content-center m-5">
        <a href="../admin/admin_loged.php">
            <h1>ESPACE ADMIN</h1>
        </a>
    </div>

    <div class="d-flex justify-content-around">
        <div class="card text-dark bg-secondary border-primary m-1" style="max-width: 22rem;">
            <h5 class="card-header">UTILISATEURS</h5>
            <div class="card-body">
                <p><strong>Gestion des utilisateur : </strong> visualiser les listes, report, ban et suppression </p>
                <a href="../admin/users/admin_user.php" class="btn btn-primary">GO</a>
            </div>
        </div>

        <div class="card text-dark bg-secondary border-success m-1" style="max-width: 22rem;">
            <h5 class="card-header">BASSISTES</h5>
            <div class="card-body">
                <p><strong>Gestion des bassistes : </strong> visualiser fiches des bassistes, update de la biographie, update de leur equipboard et ajout de nouveaux bassistes</p>
                <a href="../admin/bass_player/admin_bassPlayer.php" class="btn btn-success">GO</a>
            </div>
        </div>

        <div class="card text-dark bg-secondary border-warning m-1" style="max-width: 22rem;">
            <h5 class="card-header">LIENS</h5>
            <div class="card-body">
                <p><strong>Gestion des liens youtubes et tablature : </strong> visualiser les liens de morceau des bassistes, update des liens, test de redirection et ajout de nouveaux liens</p>
                <a href="../admin/admin_link/admin_link.php" class="btn btn-warning">GO</a>
            </div>
        </div>

        <div class="card text-dark bg-secondary border-info m-1" style="max-width: 22rem;">
            <h5 class="card-header">EQUIPBOARD</h5>
            <div class="card-body">
                <p><strong>Gestion des equipboards (instruments) : </strong> visualiser les equipboard (catégorie, nom et marque), update des equipboards, ajout de nouveaux equipboards et catégories</p>
                <a href="../admin/equip/admin_equip.php" class="btn btn-info">GO</a>
            </div>
        </div>
    </div>

</body>

</html>