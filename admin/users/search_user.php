<?php

$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

$pseudo = $_GET['pseudo'];

if ($idSession) {
    $stateSession = $pdo->prepare('SELECT * FROM session WHERE idSession = :id');
    $stateSession->bindValue(':id', $idSession);
    $stateSession->execute();
    $session = $stateSession->fetch();

    $stateUser = $pdo->prepare('SELECT * FROM user WHERE idUser=:id AND roleModo = 1');
    $stateUser->bindValue(':id', $session['idUser']);
    $stateUser->execute();
    $user = $stateUser->fetch();
} else {
    $user = null;
    header('location: ../index.php');
}

$stateReadOneUser = $pdo->prepare('SELECT * FROM user WHERE pseudoUser LIKE :pseudo ORDER BY pseudoUser');
$stateReadOneUser->bindValue(':pseudo', "%$pseudo%");
$stateReadOneUser->execute();
$allUser = $stateReadOneUser->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>


<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <table class="table table-primary table-striped">
        <thead>
            <tr>
                <form action="./search_user.php" method="GET">
                    <button class="btn btn-primary mb-3">Search</button>
                    <th>PSEUDO
                        <input type="text" name="pseudo" placeholder="Pseudo">
                    </th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>MODERATEUR</th>
                    <th>BAN</th>
                    <?php if ($user['roleAdmin'] === 1) { ?>
                        <th>SUPRESSION</th>
                    <?php } ?>
                </form>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($allUser as $au) { ?>
                <tr>
                    <th><button class="btn btn-danger"><img src="../siqtheme-master/dist/img/flag.png" alt="" width="15px" height="15px"></button> <a href="./resume_user.php?idUser=<?= $au['idUser'] ?>"><?= $au['pseudoUser'] ?></a></td>
                    <td><?= $au['nomUser'] ?></td>
                    <td><?= $au['prenomUser'] ?></td>
                    <td>
                        <?php if ($user['roleAdmin'] === 1) { ?>
                            <?php if ($user['idUser'] === $au['idUser']) { ?>
                                <button class="btn btn-secondary"><?= $au['roleModo'] ?></button>
                            <?php } else if ($au['roleModo'] === 1) { ?>
                                <a href="./switchModo_search.php?idUser=<?= $au['idUser'] ?>&pseudo=<?= $pseudo ?>" target="_parent"><button class="btn btn-primary"><?= $au['roleModo'] ?></button></a>
                            <?php } else { ?>
                                <a href="./switchModo_search.php?idUser=<?= $au['idUser'] ?>&pseudo=<?= $pseudo ?>" target="_parent"><button class="btn btn-outline-primary"><?= $au['roleModo'] ?></button></a>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if ($au['roleModo'] === 1) { ?>
                                <button class="btn btn-secondary"><?= $au['roleModo'] ?></button>
                            <?php } else { ?>
                                <button class="btn btn-outline-secondary"><?= $au['roleModo'] ?></button>
                            <?php } ?>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($user['idUser'] === $au['idUser']) { ?>
                            <button class="btn btn-secondary">ban</button>
                        <?php } else { ?>
                            <a href="./ban_user.php?idUser=<?= $au['idUser'] ?>"><button class="btn btn-warning">ban</button></a>
                        <?php } ?>
                    </td>
                    <?php if ($user['roleAdmin'] === 1) { ?>
                        <td>
                            <?php if ($user['idUser'] === $au['idUser']) { ?>
                                <button class="btn btn-secondary">sup</button>
                            <?php } else { ?>
                                <a href="./sup_user.php?idUser=<?= $au['idUser'] ?>"><button class="btn btn-danger">sup</button></a>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>