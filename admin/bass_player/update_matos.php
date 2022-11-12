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

$stateRead = $pdo->prepare('SELECT * FROM artiste WHERE idArtiste = :id');
$stateRead->bindvalue(':id', $idArtiste);
$stateRead->execute();
$thisArtiste = $stateRead->fetch();


// BASS
$stateReadBass = $pdo->prepare('SELECT DISTINCT nomMatos, utiliser.idMatos FROM utiliser, matos 
    WHERE idArtiste = :id
    AND matos.idMatos = utiliser.idMatos
    AND idCat = 1
    ORDER BY nomMatos');
$stateReadBass->bindvalue(':id', $idArtiste);
$stateReadBass->execute();
$thisBass = $stateReadBass->fetchAll();

$stateReadAllBass = $pdo->prepare('SELECT DISTINCT nomMatos, idMatos FROM matos 
    WHERE idCat = 1
    ORDER BY nomMatos');
$stateReadAllBass->execute();
$allBass = $stateReadAllBass->fetchAll();


// AMP
$stateReadAmp = $pdo->prepare('SELECT DISTINCT nomMatos, utiliser.idMatos FROM utiliser, matos 
    WHERE idArtiste = :id
    AND matos.idMatos = utiliser.idMatos
    AND idCat = 2
    ORDER BY nomMatos');
$stateReadAmp->bindvalue(':id', $idArtiste);
$stateReadAmp->execute();
$thisAmp = $stateReadAmp->fetchAll();

$stateReadAllAmp = $pdo->prepare('SELECT DISTINCT nomMatos, idMatos FROM matos 
    WHERE idCat = 2
    ORDER BY nomMatos');
$stateReadAllAmp->execute();
$allAmp = $stateReadAllAmp->fetchAll();


// EFFECT
$stateReadEffect = $pdo->prepare('SELECT DISTINCT nomMatos, utiliser.idMatos FROM utiliser, matos 
    WHERE idArtiste = :id
    AND matos.idMatos = utiliser.idMatos
    AND idCat != 1
    AND idCat != 2
    ORDER BY nomMatos');
$stateReadEffect->bindvalue(':id', $idArtiste);
$stateReadEffect->execute();
$thisEffect = $stateReadEffect->fetchAll();

$stateReadAllEffect = $pdo->prepare('SELECT DISTINCT nomMatos, idMatos FROM matos 
    WHERE idCat != 1
    AND idCat != 2
    ORDER BY nomMatos');
$stateReadAllEffect->execute();
$allEffect = $stateReadAllEffect->fetchAll();


// POST, ajout d'instrument pour l'artiste
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'effect' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $errors = [
        'effect' => '',
    ];

    $bass = $_POST['bass'] ?? null;
    $amp = $_POST['amp'] ?? null;
    $effect = $_POST['effect'] ?? null;

    if ($bass !== null) {
        if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
            $stateAddEffect = $pdo->prepare('INSERT INTO utiliser VALUES(:artiste, :matos)');
            $stateAddEffect->bindvalue(':artiste', $idArtiste);
            $stateAddEffect->bindvalue(':matos', $bass);
            $stateAddEffect->execute();

            header('location: ./update_matos.php?idArtiste=' . $idArtiste);
        }
    } else if ($amp !== null) {
        if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
            $stateAddEffect = $pdo->prepare('INSERT INTO utiliser VALUES(:artiste, :matos)');
            $stateAddEffect->bindvalue(':artiste', $idArtiste);
            $stateAddEffect->bindvalue(':matos', $amp);
            $stateAddEffect->execute();

            header('location: ./update_matos.php?idArtiste=' . $idArtiste);
        }
    } else if ($effect !== null) {
        if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
            $stateAddEffect = $pdo->prepare('INSERT INTO utiliser VALUES(:artiste, :matos)');
            $stateAddEffect->bindvalue(':artiste', $idArtiste);
            $stateAddEffect->bindvalue(':matos', $effect);
            $stateAddEffect->execute();

            header('location: ./update_matos.php?idArtiste=' . $idArtiste);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once '../shared_admin/head.php' ?>

<body class="p-3 mb-2 bg-dark text-white">
    <?php require_once '../shared_admin/header.php' ?>

    <div class="d-flex justify-content-center">

        <div class="card border-success bg-secondary mb-3 ms-4" style="min-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">BASSES</h5>
                <ul>
                    <?php foreach ($thisBass as $tb) { ?>
                        <li class="list-group-item"><a href="./delete_matos.php?idArtiste=<?= $idArtiste ?>&bass=<?= $tb['idMatos'] ?>"><button class="btn btn-danger mb-2 mt-2">x</button></a> <?= $tb['nomMatos'] ?></li>
                    <?php } ?>
                    <form action="./update_matos.php?idArtiste=<?= $idArtiste ?>" method="POST">
                        <div class="input-group mb-3">
                            <select name="bass">
                                <option>Ajouter une basse</option>
                                <?php foreach ($allBass as $ab) { ?>
                                    <option value="<?= $ab['idMatos'] ?>"><?= $ab['nomMatos'] ?></option>
                                <?php } ?>
                            </select>
                            <button class="input-group-text btn btn-success">+</button>
                        </div>
                    </form>
                </ul>
            </div>
        </div>

        <div class="card border-success mb-3 ms-4" style="min-width: 18rem;">
            <div class="card-body bg-secondary">
                <h5 class="card-title">AMPLIS</h5>
                <ul>
                    <?php foreach ($thisAmp as $ta) { ?>
                        <li class="list-group-item"><a href="./delete_matos.php?idArtiste=<?= $idArtiste ?>&amp=<?= $ta['idMatos'] ?>"><button class="btn btn-danger mb-2 mt-2">x</button></a> <?= $ta['nomMatos'] ?></li>
                    <?php } ?>
                    <form action="./update_matos_confirm.php?idArtiste=<?= $idArtiste ?>" method="POST">
                        <div class="input-group mb-3">
                            <select name="amp" id="">
                                <option>Ajouter un ampli</option>
                                <?php foreach ($allAmp as $aa) { ?>
                                    <option value="<?= $aa['idMatos'] ?>"><?= $aa['nomMatos'] ?></option>
                                <?php } ?>
                            </select>
                            <button class="input-group-text btn btn-success">+</button>
                        </div>
                    </form>
                </ul>
            </div>
        </div>

        <div class="card border-success mb-3 ms-4" style="min-width: 18rem;">
            <div class="card-body bg-secondary">
                <h5 class="card-title">EFFECTS</h5>
                <ul>
                    <?php foreach ($thisEffect as $te) { ?>
                        <li class="list-group-item"><a href="./delete_matos.php?idArtiste=<?= $idArtiste ?>&effect=<?= $te['idMatos'] ?>"><button class="btn btn-danger mb-2 mt-2">x</button></a> <?= $te['nomMatos'] ?></li>
                    <?php } ?>
                    <form action="./update_matos.php?idArtiste=<?= $idArtiste ?>" method="POST">
                        <div class="input-group mb-3">
                            <select name="effect" id="">
                                <option>Ajouter un effect</option>
                                <?php foreach ($allEffect as $ae) { ?>
                                    <option value="<?= $ae['idMatos'] ?>"><?= $ae['nomMatos'] ?></option>
                                <?php } ?>
                            </select>
                            <button class="input-group-text btn btn-success">+</button>
                        </div>
                    </form>
                </ul>
            </div>
        </div>

    </div>
    </div>
    </div>


</body>

</html>