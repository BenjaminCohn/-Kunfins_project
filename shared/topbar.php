<?php
$stateJazz = $pdo->prepare('SELECT * FROM style WHERE idStyle = 1');
$stateJazz->execute();
$jazz = $stateJazz->fetch();

$stateRock = $pdo->prepare('SELECT * FROM style WHERE idStyle = 2');
$stateRock->execute();
$rock = $stateRock->fetch();

$stateMetal = $pdo->prepare('SELECT * FROM style WHERE idStyle = 3');
$stateMetal->execute();
$metal = $stateMetal->fetch();

$stateFD = $pdo->prepare('SELECT * FROM style WHERE idStyle = 4');
$stateFD->execute();
$fd = $stateFD->fetch();

$stateReg = $pdo->prepare('SELECT * FROM style WHERE idStyle = 5');
$stateReg->execute();
$reggae = $stateReg->fetch();
?>
<div class="TopBar">
    <h2 class="header2h2" style="color: whitesmoke; padding-left: 15px;"><a href="../">Styles :</a></h2>
    <li><a class="puce" href="../index.php<?= "?idStyle=" . $jazz['idStyle'] ?>">
            <h3 class="styletb1">Jazz</h3>
        </a></li>
    <li><a class="puce" href="../index.php<?= "?idStyle=" . $rock['idStyle'] ?>">
            <h3 class="styletb2">Rock</h3>
        </a></li>
    <li><a class="puce" href="../index.php<?= "?idStyle=" . $metal['idStyle'] ?>">
            <h3 class="styletb3">Metal</h3>
        </a></li>
    <li><a class="puce" href="../index.php<?= "?idStyle=" . $fd['idStyle'] ?>">
            <h3 class="styletb4">Funk / Disco</h3>
        </a></li>
    <li><a class="puce" href="../index.php<?= "?idStyle=" . $reggae['idStyle'] ?>">
            <h3 class="styletb5">Reggae</h3>
        </a></li>
</div>