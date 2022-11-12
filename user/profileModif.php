<?php

const ERROR_LENGTH = "Le pseudo doit faire entre 2 et 25 caractères";
const ERROR_VERIFY_PSEUDO = "Pseudo déjà existant";
const ERROR_VERIFY_MAIL = "Adresse mail déjà existante";

$pdo = require_once '../shared/db.php';

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
    header('Location: ./login.php');
}

$errors = [
    'firstname' => '',
    'lastname' => '',
    'pseudo' => '',
    'email' => '',
];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_input = filter_input_array(INPUT_POST, [
        'firstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'lastname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'pseudo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
    ]);

    $lastname = $_input["lastname"];
    $firstname = $_input["firstname"];
    $pseudo = $_input["pseudo"];
    $email = $_input["email"];

    if ($user['pseudoUser'] !== $pseudo) {
        $stateVerifyPseudo = $pdo->prepare('SELECT * FROM user WHERE pseudoUser = :pseudo');
        $stateVerifyPseudo->bindvalue(':pseudo', $pseudo);
        $stateVerifyPseudo->execute();
        $responsePseudo = $stateVerifyPseudo->fetch();

        if ($responsePseudo == true) {
            $errors['pseudo'] = ERROR_VERIFY_PSEUDO;
        }
    }

    if ($user['mailUser'] !== $email) {
        $stateVerifyMail = $pdo->prepare('SELECT * FROM user WHERE mailUser=:email');
        $stateVerifyMail->bindvalue(':email', $email);
        $stateVerifyMail->execute();
        $responseMail = $stateVerifyMail->fetch();

        if ($responseMail == true) {
            $errors['email'] = ERROR_VERIFY_MAIL;
        }
    }

    if (!$firstname) {
        $errors['firstname'] = ERROR_REQUIRED;
    } else if (mb_strlen($firstname) < 2 || mb_strlen($firstname) > 25) {
        $errors['firstname'] = ERROR_LENGTH;
    };

    if (!$lastname) {
        $errors['lastname'] = ERROR_REQUIRED;
    } else if (mb_strlen($firstname) < 2 || mb_strlen($firstname) > 25) {
        $errors['lastname'] = ERROR_LENGTH;
    };

    if (!$pseudo) {
        $errors['pseudo'] = ERROR_REQUIRED;
    } else if (mb_strlen($pseudo) < 2 || mb_strlen($pseudo) > 25) {
        $errors['pseudo'] = ERROR_LENGTH;
    }

    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $switchProfil = $pdo->prepare('UPDATE user SET nomUser = :nom, prenomUser = :prenom, pseudoUser = :pseudo, mailUser = :mail
        WHERE idUser = :idUser');
        $switchProfil->bindValue(':idUser', $session['idUser']);
        $switchProfil->bindValue(':nom', $lastname);
        $switchProfil->bindValue(':prenom', $firstname);
        $switchProfil->bindValue(':pseudo', $pseudo);
        $switchProfil->bindValue(':mail', $email);
        $switchProfil->execute();

        header('Location: ./profile.php');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared/head.php' ?>

<body>
    <div class="container">
        <?php require_once '../shared/header.php' ?>
        <?php require_once '../shared/topbar.php' ?>
        <div class="main">
            <div class="modifCompte">
                <div class="co">

                    <form action="./profileModif.php" method="POST" class="insc">
                        <h2>Modification de votre Profile</h2>
                        
                        <label for="email">e-mail</label>
                        <input type="email" placeholder="e-mail" name="email" value="<?= isset($email) ? "$email" : $user['mailUser'] ?>">
                        <?= $errors['email'] ? '<p style = "color : red">' . $errors['email'] . '</p>' : '' ?>
                        <br>

                        <label for="lastname">Nom</label>
                        <input type="text" placeholder="Nouveau Nom" name="lastname" value="<?= isset($lastname) ? "$lastname" : $user['nomUser'] ?>">
                        <?= $errors['lastname'] ? '<p style = "color:red">' . $errors['lastname'] . '</p>' : '' ?>
                        <br>

                        <label for="firstname">Prenom</label>
                        <input type="text" placeholder="Nouveau Prenom" name="firstname" value="<?= isset($firstname) ? "$firstname" : $user['prenomUser'] ?>">
                        <?= $errors['firstname'] ? '<p style = "color:red">' . $errors['firstname'] . '</p>' : '' ?>
                        <br>

                        <label for="pseudo">Pseudo</label>
                        <input type="text" placeholder="Nouveau Pseudo" name="pseudo" value="<?= isset($pseudo) ? "$pseudo" : $user['pseudoUser'] ?>">
                        <?= $errors['pseudo'] ? '<p style = "color:red">' . $errors['pseudo'] . '</p>' : '' ?>
                        <br>

                        <button>Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once '../shared/footer.php' ?>
</body>

</html>