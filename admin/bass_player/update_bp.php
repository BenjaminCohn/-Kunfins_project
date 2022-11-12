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

$stateReadArtiste = $pdo->prepare('SELECT artiste.idArtiste, prenomArtiste, nomArtiste, groupeArtiste, nomStyle FROM artiste, style WHERE style.idStyle = artiste.idStyle ORDER BY prenomArtiste');
$stateReadArtiste->execute();
$allArtiste = $stateReadArtiste->fetchAll();

$stateReadOneArtiste = $pdo->prepare('SELECT artiste.idArtiste, prenomArtiste, nomArtiste, groupeArtiste, descArtiste, imgArtiste, nomStyle, artiste.idStyle FROM artiste, style WHERE style.idStyle = artiste.idStyle AND idartiste = :artiste ORDER BY prenomArtiste');
$stateReadOneArtiste->bindValue(':artiste', $idArtiste);
$stateReadOneArtiste->execute();
$thisArtiste = $stateReadOneArtiste->fetch();

$stateReadStyle = $pdo->prepare('SELECT * FROM style');
$stateReadStyle->execute();
$readStyle = $stateReadStyle->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_input = filter_input_array(INPUT_POST, [
        'prenom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'nom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'groupe' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'img' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'style' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'desc' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $prenom = $_input['prenom'];
    $nom = $_input['nom'];
    $groupe = $_input['groupe'];
    $img = $_input['img'];
    $style = $_input['style'];
    $desc = $_input['desc'];

    $stateUpdateArtiste = $pdo->prepare('UPDATE artiste SET 
        prenomArtiste = :prenom,
        nomArtiste = :nom,
        groupeArtiste = :groupe,
        imgArtiste = :img,
        idStyle = :style,
        descArtiste = :desc
        WHERE idArtiste = :id');
    $stateUpdateArtiste->bindvalue(':prenom', $prenom);
    $stateUpdateArtiste->bindvalue(':nom', $nom);
    $stateUpdateArtiste->bindvalue(':groupe', $groupe);
    $stateUpdateArtiste->bindvalue(':img', $img);
    $stateUpdateArtiste->bindvalue(':style', $style);
    $stateUpdateArtiste->bindvalue(':desc', $desc);
    $stateUpdateArtiste->bindvalue(':id', $idArtiste);
    $stateUpdateArtiste->execute();

    header('location: ./update_bp.php?idArtiste=' . $idArtiste);
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="bg-secondary bg-gradient p-5 bg-opacity-75 border border-success rounded">
        <form action="./update_bp.php?idArtiste=<?= $idArtiste ?>" method="post">
            <div class="group-form">
                <div class="input-group mb-3">
                    <span for="prenom" class="input-group-text">PRENOM</span>
                    <input name="prenom" type="text" class="form-control" value="<?= $thisArtiste['prenomArtiste'] ?>">
                </div>

                <div class="input-group mb-3">
                    <span for="nom" class="input-group-text" id="basic-addon2">NOM</span>
                    <input name="nom" type="text" class="form-control" aria-describedby="basic-addon2" value="<?= $thisArtiste['nomArtiste'] ?>">
                </div>

                <div class="input-group mb-3">
                    <span for="groupe" class="input-group-text" id="basic-addon3">GROUPE</span>
                    <input name="groupe" type="text" class="form-control" aria-describedby="basic-addon3" value="<?= $thisArtiste['groupeArtiste'] ?>">
                </div>

                <div class="input-group mb-4">
                    <span for="img" class="input-group-text">IMAGE (insérer l'url)</span>
                    <input name="img" type="text" class="form-control" value="<?= $thisArtiste['imgArtiste'] ?>">
                </div>
            </div>
            <div class="input-group mb-3">
                <label for="style" class="input-group-text">STYLE</label>
                <select class="form-select" name="style">
                    <option class="border border-dark" selected value="<?= $thisArtiste['idStyle'] ?>"><?= $thisArtiste['nomStyle'] ?></option>
                    <?php foreach ($readStyle as $rs) { ?>
                        <option value="<?= $rs['idStyle'] ?>"><?= $rs['nomStyle'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="desc">DESCRIPTION</label>
                <textarea class="form-control mb-2" name="desc" id="" rows="10" value="<?= $thisArtiste['descArtiste'] ?>"><?= $thisArtiste['descArtiste'] ?></textarea>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
</body>

</html>