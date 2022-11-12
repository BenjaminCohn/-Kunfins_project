<?php

const ERROR_REQUIRED = "Veuillez renseigner ce cahmps";
const ERROR_CONNECT = "Le pseudo et / ou mot de passe ne correspond pas";

$pdo = require_once('./shared/db.php');

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
        $stateVerifyUser = $pdo->prepare('SELECT * FROM user WHERE pseudoUser=:pseudo');
        $stateVerifyUser->bindValue(':pseudo', $pseudo);
        $stateVerifyUser->execute();
        $user = $stateVerifyUser->fetch();

        $stateVerifyBan = $pdo->prepare('SELECT * FROM ban WHERE idUserBan = :id AND date > NOW()');
        $stateVerifyBan->bindValue(':id', $user['idUser']);
        $stateVerifyBan->execute();
        if ($stateVerifyBan == true) {
            header('location: ./ban.php?idUser=' . $user['idUser']);
        } else if (password_verify($password, $user['password'])) {
            $stateSession = $pdo->prepare('INSERT INTO session VALUES(DEFAULT, :iduser)');
            $stateSession->bindValue(':iduser', $user['idUser']);
            $stateSession->execute();

            $idSession = $pdo->lastInsertId();
            setcookie('session', $idSession, time() + 60 * 60 * 24 * 15);

            header('Location: ../index.php');
        } else {
            $error['password'] = ERROR_CONNECT;
        }
    }
};
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once  './shared/head.php' ?>

<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <?php require_once './shared/topbar.php' ?>
        <div class="main">
            <?php $pdo = require_once './shared/db.php' ?>

            <div class="co">
                <form action="./login.php" method="POST" class="insc">
                    <h1>CONNEXION</h1>
                    <a href="./register.php">Première connexion ? Inscrivez-vous ici.</a>


                    <label for="pseudo">Pseudo</label>
                    <input type="text" placeholder="Pseudo" name="pseudo" value=<?= isset($pseudo) ? "$pseudo" : "" ?>>
                    <?= $errors['pseudo'] ? '<p style = "color:red">' . $errors['pseudo'] . '</p>' : '' ?>
                    <br>


                    <label for="password">Mot de passe</label>
                    <input type="password" placeholder="Mot de passe" name="password">
                    <?= $errors['password'] ? '<p style = "color : red">' . $errors['password'] . '</p>' : '' ?>
                    <br>

                    <button>CONNEXION</button>
                </form>
            </div>
        </div>
    </div>
    <?php require_once './shared/footer.php' ?>
</body>

</html>