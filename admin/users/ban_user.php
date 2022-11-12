<pre>
<?php

$pdo = require_once('../shared_admin/db.php');

$idSession = $_COOKIE['session'] ?? false;
$idUser = $_GET['idUser'];
$ban = $_GET['date'] ?? null;

$seven_days = date('Y/m/d H:i:s', strtotime(' + 7 days '));
$forteen_days = date('Y/m/d H:i:s', strtotime(' + 14 days '));
$one_month = date('Y/m/d H:i:s', strtotime(' + 30 days '));
$one_year = date('Y/m/d H:i:s', strtotime(' + 365 days '));

$array_date = array(
    array("date" => $seven_days, "durée" => "7 jours"),
    array("date" => $forteen_days, "durée" => "14 jours"),
    array("date" => $one_month, "durée" => "1 mois"),
    array("date" => $one_year, "durée" => "1 an"),
);

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

$stateUser = $pdo->prepare('SELECT * FROM user WHERE idUser = :id');
$stateUser->bindValue(':id', $idUser);
$stateUser->execute();
$read_user = $stateUser->fetch();

$errors = [
    'comBan' => '',
];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_input = filter_input_array(INPUT_POST, [
        "comBan" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $ban = $_POST['date'];
    $comBan = $_input["comBan"];

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $stateBan = $pdo->prepare('INSERT INTO ban VALUES(
            DEFAULT,
            :user,
            :modo,
            :dateBan,
            :comBan)
            ');
        $stateBan->bindvalue(':user', (int) $idUser);
        $stateBan->bindvalue(':modo', $user['idUser']);
        $stateBan->bindValue(':dateBan', $ban);
        $stateBan->bindvalue(':comBan', $comBan);
        $stateBan->execute();

        header('location: ./admin_user.php');
    }
}
?>
</pre>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2  bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="border border-primary rounded">
        <div class="m-3">
            <h2>Vous êtes sur le point de bannir l'utilisateur <strong>"<?= $read_user['pseudoUser'] ?>" (<?= $read_user['nomUser'] . " " . $read_user['prenomUser'] ?>)</strong></h2>
            <h3>Selectionnez la durée du ban et un commentaire</h3>
            <form action="./ban_user.php<?= '?idUser=' . $idUser ?>" method="POST">
                <div class="form-group">
                    <label for="date">Durée du ban</label>
                    <select name="date" id="date" class="form-control">
                        <option value="date">Temps de ban</option>
                        <?php foreach ($array_date as $r) {
                        ?>
                            <option value="<?= $r["date"] ?>"><?= $r["durée"] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="comBan">Commentaire du ban</label>
                    <textarea class="form-control" name="comBan" id="comBan" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
</body>

</html>