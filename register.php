<pre>
<?php

const ERROR_REQUIRED = "Veuillez renseigner ce cahmps";
const ERROR_LENGTH = "Le pseudo doit faire entre 2 et 25 caractères";
const ERROR_EMAIL = "L'email n'est pas valide";
const ERROR_PASSWORD = "Le mot de passe doit contenir un caractère spécial";
const ERROR_CONFIRM_PASSWORD = "Les mots de passe ne correspondent pas";
const ERROR_VERIFY_PSEUDO = "Pseudo déjà existant";
const ERROR_VERIFY_MAIL = "Adresse mail déjà existante";

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
    'firstname' => '',
    'lastname' => '',
    'pseudo' => '',
    'email' => '',
    'password' => '',
    'passwordConfirm' => '',
];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_input = filter_input_array(INPUT_POST, [
        'firstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'lastname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'pseudo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
    ]);

    $firstname = ucfirst(strtolower($_input['firstname']));
    $lastname = ucfirst(strtolower($_input['lastname']));
    $pseudo = $_input["pseudo"];
    $email = $_input['email'];
    $password = $_POST["password"] ?? '';
    $passwordConfirm = $_POST['passwordConfirm'];

    $stateVerifyPseudo = $pdo->prepare('SELECT * FROM user WHERE pseudoUser=:pseudo');
    $stateVerifyPseudo->bindvalue(':pseudo', $pseudo);
    $stateVerifyPseudo->execute();
    $responsePseudo = $stateVerifyPseudo->fetch();

    if ($responsePseudo == true) {
        $errors['pseudo'] = ERROR_VERIFY_PSEUDO;
    }

    $stateVerifyMail = $pdo->prepare('SELECT * FROM user WHERE mailUser=:email');
    $stateVerifyMail->bindvalue(':email', $email);
    $stateVerifyMail->execute();
    $responseMail = $stateVerifyMail->fetch();

    if ($responseMail == true) {
        $errors['email'] = ERROR_VERIFY_MAIL;
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
    } else if ($email === $stateVerifyMail) {
        $errors['email'] = ERROR_VERIFY_MAIL;
    }

    if (!$password) {
        $errors['password'] = ERROR_REQUIRED;
    } else if (!preg_match('/^\S*(?=\S{8,20})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[!@#$%])(?=\S*[\d])\S*$/', $password)) {
        $errors['password'] = ERROR_PASSWORD;
    }

    if ($password !== $passwordConfirm) {
        $errors['passwordConfirm'] = ERROR_CONFIRM_PASSWORD;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
        $stateRegister = $pdo->prepare('INSERT INTO user VALUES(
            DEFAULT,
            :lastname,
            :firstname,
            :pseudo,
            :email,
            :password,
            0,
            0)
            ');
        $stateRegister->bindValue(':lastname', $lastname);
        $stateRegister->bindValue(':firstname', $firstname);
        $stateRegister->bindValue(':pseudo', $pseudo);
        $stateRegister->bindValue(':email', $email);
        $stateRegister->bindValue(':password', $hashedPassword);
        $stateRegister->execute();

        header('Location: ./login.php');
    }
};

?>
</pre>

<!DOCTYPE html>
<html lang="fr">

<?php
require_once  './shared/head.php'
?>

<body>
    <div class="container">
        <?php
        require_once './shared/header.php'
        ?>

        <?php
        require_once './shared/topbar.php'
        ?>
        <div class="main">
            <?php
            $pdo = require_once './shared/db.php'
            ?>

            <div class="sign">
                <form action="./register.php" method="POST" class="insc">
                    <h1>INSCRIPTION</h1>

                    <a href="./login.php">Déjà incrit ? Connectez-vous ici.</a>

                    <label for="lastname">Nom</label>
                    <input type="text" placeholder="Nom" name="lastname" value=<?= isset($lastname) ? "$lastname" : "" ?>>
                    <?= $errors['lastname'] ? '<p style = "color:red">' . $errors['lastname'] . '</p>' : '' ?>



                    <label for="firstname">Prenom</label>
                    <input type="text" placeholder="Prenom" name="firstname" value=<?= isset($firstname) ? "$firstname" : "" ?>>
                    <?= $errors['firstname'] ? '<p style = "color:red">' . $errors['firstname'] . '</p>' : '' ?>


                    <label for="pseudo">Pseudo</label>
                    <input type="text" placeholder="Pseudo" name="pseudo" value=<?= isset($pseudo) ? "$pseudo" : "" ?>>
                    <?= $errors['pseudo'] ? '<p style = "color:red">' . $errors['pseudo'] . '</p>' : '' ?>


                    <label for="email">e-mail</label>
                    <input type="email" placeholder="e-mail" name="email" id="email">
                    <?= $errors['email'] ? '<p style = "color : red">' . $errors['email'] . '</p>' : '' ?>


                    <label for="password">Mot de passe</label>
                    <input type="password" placeholder="Mot de passe" name="password" value=<?= isset($password) ? "$password" : "" ?>>
                    <?= $errors['password'] ? '<p style = "color : red">' . $errors['password'] . '</p>' : '' ?>


                    <label for="password">Vérification de mot de passe</label>
                    <input type="password" placeholder="Vérification de mot de passe" name="passwordConfirm" value=<?= isset($password) ? "$password" : "" ?>>
                    <?= $errors['passwordConfirm'] ? '<p style = "color : red">' . $errors['passwordConfirm'] . '</p>' : '' ?>
                    <br>

                    <button>INSCRIPTION</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    require_once './shared/footer.php'
    ?>
</body>

</html>