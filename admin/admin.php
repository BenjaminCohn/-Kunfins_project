<?php

const ERROR_REQUIRED = "Veuillez renseigner ce cahmps";
const ERROR_CONNECT = "Le pseudo et / ou mot de passe ne correspond pas";

$pdo = require_once('../admin/shared_admin/db.php');

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
}

$errors = [
    'pseudo' => '',
    'password' => '',
];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_input = filter_input_array(INPUT_POST, [
        'pseudo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ]);

    $pseudo = $_input["pseudo"];
    $password = $_POST['password'];

    if (!$pseudo) {
        $error['pseudo'] = ERROR_REQUIRED;
    }

    if (!$password) {
        $errors['password'] = ERROR_REQUIRED;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $stateVerify = $pdo->prepare('SELECT * FROM user WHERE pseudoUser = :pseudo AND roleAdmin = 1 OR roleModo = 1');
        $stateVerify->bindValue(':pseudo', $pseudo);
        $stateVerify->execute();
        $user = $stateVerify->fetch();

        $stateSession = $pdo->prepare('INSERT INTO session VALUES(DEFAULT, :idUser)');
        $stateSession->bindValue(':idUser', $user['idUser']);
        $stateSession->execute();

        $idSession = $pdo->lastInsertId();
        setcookie('session', $idSession, time() + 60 * 60 * 24 * 15);
        header('Location: ./admin_loged.php');
    }
};


?>
<!DOCTYPE html>
<html lang="fr">

<?php require_once './shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <h1>ESPACE ADMIN</h1>

    <form action="../admin/admin.php" method="POST">
        <h1>CONNEXION</h1>

        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" value=<?= isset($pseudo) ? "$pseudo" : "" ?>>
        <?= $errors['pseudo'] ? '<p style = "color:red">' . $errors['pseudo'] . '</p>' : '' ?>
        <br>


        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" placeholder="Mot de passe" name="password">
        <?= $errors['password'] ? '<p style = "color : red">' . $errors['password'] . '</p>' : '' ?>
        <br>

        <button class="btn btn-outline-light">CONNEXION</button>
    </form>
</body>

</html>