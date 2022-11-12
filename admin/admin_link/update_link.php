<?php
$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;

$idArtiste = $_GET['idArtiste'];

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

$stateReadLink = $pdo->prepare('SELECT liens.idArtiste, morceau, youtube, tab, prenomArtiste, nomArtiste, groupeArtiste FROM artiste, liens 
    WHERE artiste.idArtiste = liens.idArtiste 
    AND liens.idArtiste = :id
    ORDER BY morceau');
$stateReadLink->bindvalue(':id', $idArtiste);
$stateReadLink->execute();
$thisLink = $stateReadLink->fetch();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_input = filter_input_array(INPUT_POST, [
        'youtube' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'tab' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $youtube = str_replace("watch?v=", "embed/", $_input['youtube']);
    $tab = $_input['tab'];

    $stateUpdateLink = $pdo->prepare('UPDATE liens SET
        youtube = :youtube,
        tab = :tab
        WHERE idArtiste = :id');
    $stateUpdateLink->bindvalue(':id', $idArtiste);
    $stateUpdateLink->bindvalue(':youtube', $youtube);
    $stateUpdateLink->bindvalue(':tab', $tab);
    $stateUpdateLink->execute();

    header('location: ./update_link.php?idArtiste=' . $idArtiste);
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="d-flex justify-content-evenly">
        <form action="./update_link.php?idArtiste=<?= $idArtiste ?>" method="POST">
            <div class="card border-warning bg-secondary mb-3" style="min-width: 56rem;">
                <div class="card-header"><?= $thisLink['morceau'] . " - " . $thisLink['prenomArtiste'] . " " . $thisLink['nomArtiste'] ?></div>
                <div class="card-body text-warning">
                    <h5>TABLATURE</h5>
                    <input name="tab" class="form-control mb-3" type="text" value="<?= $thisLink['tab'] ?>">
                    <div>
                        <a class="btn btn-warning mb-3" href="<?= $thisLink['tab'] ?>" target="_blank">Test de redirection</a>
                    </div>
                    <h5 class="card-title">YOUTUBE</h5>
                    <input name="youtube" class="form-control mb-3" type="text" value="<?= $thisLink['youtube'] ?>">
                    <p class="card-text d-flex justify-content-center"><iframe src="<?= $thisLink['youtube'] ?>" frameborder="0" style="min-width: 38rem; min-height: 20rem;"></iframe></p>
                    <button class="btn btn-outline-warning">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>