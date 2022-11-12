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

const ERROR_EXIST = "L'artiste est déjà existant";

$stateReadStyle = $pdo->prepare('SELECT * FROM style');
$stateReadStyle->execute();
$readStyle = $stateReadStyle->fetchAll();

$errors = [
    'prenom' => '',
    'style' => '',
    'desc' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'prenom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'nom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'groupe' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'style' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'desc' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'img' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $prenom = ucfirst(strtolower($_input['prenom']));
    $nom = ucfirst(strtolower($_input['nom'])) ?? '';
    $groupe = $_input['groupe'] ?? '';
    $style = $_POST['style'];
    $desc = $_input['desc'];
    $img = $_input['img'];

    $stateVerifyArtiste = $pdo->prepare('SELECT * FROM artiste WHERE nomArtiste = :nom AND prenomArtiste = :prenom AND groupeArtiste = :groupe');
    $stateVerifyArtiste->bindvalue(':prenom', $prenom);
    $stateVerifyArtiste->bindvalue(':nom', $nom);
    $stateVerifyArtiste->bindvalue(':groupe', $groupe);
    $stateVerifyArtiste->execute();
    $responseArtiste = $stateVerifyArtiste->fetch();

    if ($responseArtiste == true) {
        $errors['prenom'] = ERROR_EXIST;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $stateNewBP = $pdo->prepare('INSERT INTO artiste VALUES(
            DEFAULT,
            :nom,
            :prenom,
            :groupe,
            :desc,
            :img,
            :style)');
        $stateNewBP->bindvalue(':nom', $nom);
        $stateNewBP->bindvalue(':prenom', $prenom);
        $stateNewBP->bindvalue(':groupe', $groupe);
        $stateNewBP->bindvalue(':desc', $desc);
        $stateNewBP->bindvalue(':img', $img);
        $stateNewBP->bindvalue(':style', $style);
        $stateNewBP->execute();

        header('location: ./admin_bassPlayer.php');
    }
};
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="bg-secondary bg-gradient p-5 bg-opacity-75 border border-success rounded">
        <form action="./new_bp.php" method="post">
            <div class="group-form">

                <?= $errors['prenom'] ? '<h5 class="mb-3" style = "color:darkorange">' . $errors['prenom'] . '</h5>' : '' ?>

                <div class="input-group mb-3">
                    <span for="prenom" class="input-group-text">PRENOM</span>
                    <input name="prenom" type="text" class="form-control">
                </div>

                <div class="input-group mb-3">
                    <span for="nom" class="input-group-text">NOM</span>
                    <input name="nom" type="text" class="form-control">
                </div>

                <div class="input-group mb-3">
                    <span for="groupe" class="input-group-text">GROUPE</span>
                    <input name="groupe" type="text" class="form-control">
                </div>
            </div>
            <div class="input-group mb-4">
                <span for="img" class="input-group-text">IMAGE (insérer une url)</span>
                <input name="img" type="text" class="form-control">
            </div>
            <div class="input-group mb-3">
                <label for="style" class="input-group-text">STYLE</label>
                <select class="form-select" name="style">
                    <option selected>Choose...</option>
                    <?php foreach ($readStyle as $rs) { ?>
                        <option value="<?= $rs['idStyle'] ?>"><?= $rs['nomStyle'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="desc">DESCRIPTION</label>
                <textarea class="form-control mb-2" name="desc" id="" rows="10"></textarea>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
</body>

</html>