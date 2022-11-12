<pre>
<?php
$pdo = require_once('./shared/db.php');

$idSession = $_COOKIE['session'] ?? false;

$now = date("j/n/Y H:i:s");

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

$err = [
    'com' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'com' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'idList' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'idArtiste' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $idList = $_input['idList'];
    $idArtiste = $_input['idArtiste'];
    $com = $_POST["com"];

    if (empty(array_filter($err, fn ($e) => $e !== ''))) {
        $stateCom = $pdo->prepare('INSERT INTO comment VALUES(
            DEFAULT,
            :idUser,
            :idList,
            :com,
            NOW())
            ');
        $stateCom->bindValue(':idUser', $user['idUser']);
        $stateCom->bindValue(':idList', $idList);
        $stateCom->bindValue(':com', $com);
        $stateCom->execute();

        header('location: ./resume.php?idList=' . $idList . '&idArtiste1=' . $idArtiste);
    }
}
?>
</pre>