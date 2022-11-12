<?php

$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

if ($idSession) {
    $stateSession = $pdo->prepare('SELECT * FROM session WHERE idSession = :id');
    $stateSession->bindValue(':id', $idSession);
    $stateSession->execute();
    $session = $stateSession->fetch();

    $stateUser = $pdo->prepare('SELECT * FROM user WHERE idUser = :id AND roleModo = 1');
    $stateUser->bindValue(':id', $session['idUser']);
    $stateUser->execute();
    $user = $stateUser->fetch();
} else {
    $user = null;
    header('location: ../index.php');
}

$stateReadUser = $pdo->prepare('SELECT * FROM user ORDER BY pseudoUser');
$stateReadUser->execute();
$allUser = $stateReadUser->fetchAll();

$stateReadReport = $pdo->prepare('SELECT * FROM report');
$stateReadReport->execute();
$report = $stateReadReport->fetchAll();
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
                    <th>
                        <?php
                        // cette requete est appelé dans la boucle pour récupérer la variable au['idUser'] afin d'afficher sur chaque utilisateur, 
                        // s'il est soumis a un report
                        $stateVerifyReport = $pdo->prepare('SELECT idUser, idUserReported, view FROM user, report WHERE idUserReported = :id');
                        $stateVerifyReport->bindvalue(':id', $au['idUser']);
                        $stateVerifyReport->execute();
                        $responseReport = $stateVerifyReport->fetch();
                        ?>
                        <?php if ($responseReport == true && $responseReport['view'] == 0) { ?>
                            <a href="./report.php?idUserReported=<?= $responseReport['idUserReported'] ?>" class="btn btn-danger"><img src="../siqtheme-master/dist/img/flag.png" alt="" width="15px" height="15px"></a>
                        <?php } else if ($responseReport == true) { ?>
                            <a href="./report.php?idUserReported=<?= $responseReport['idUserReported'] ?>" class="btn btn-outline-danger"><img src="../siqtheme-master/dist/img/flag.png" alt="" width="15px" height="15px"></a>
                        <?php } else { ?>
                            <button class="btn btn-outline-secondary"><img src="../siqtheme-master/dist/img/flag.png" alt="" width="15px" height="15px"></button>
                        <?php } ?>
                        <a href="./resume_user.php?idUser=<?= $au['idUser'] ?>"><?= $au['pseudoUser'] ?></a>
                    </th>
                    <td><?= $au['nomUser'] ?></td>
                    <td><?= $au['prenomUser'] ?></td>
                    <td>
                        <?php if ($user['roleAdmin'] === 1) { ?>
                            <?php if ($user['idUser'] === $au['idUser']) { ?>
                                <button class="btn btn-secondary"><?= $au['roleModo'] ?></button>
                            <?php } else if ($au['roleModo'] === 1) { ?>
                                <a href="./switchModo.php?idUser=<?= $au['idUser'] ?>" target="_parent" class="btn btn-primary"><?= $au['roleModo'] ?></a>
                            <?php } else { ?>
                                <a href="./switchModo.php?idUser=<?= $au['idUser'] ?>" target="_parent" class="btn btn-outline-primary"><?= $au['roleModo'] ?></a>
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
                            <button class="btn btn-secondary">BAN</button>
                        <?php } else { ?>
                            <a href="./ban_user.php?idUser=<?= $au['idUser'] ?>" class="btn btn-warning">BAN</a>
                        <?php } ?>
                    </td>
                    <?php if ($user['roleAdmin'] === 1) { ?>
                        <td>
                            <?php if ($user['idUser'] === $au['idUser']) { ?>
                                <button class="btn btn-secondary">DELETE</button>
                            <?php } else { ?>
                                <a href="./sup_user.php?idUser=<?= $au['idUser'] ?>" class="btn btn-danger">DELETE</a>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>