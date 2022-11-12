<?php
// c'est le fichier de point d'entrée vers la BDD
$password = '';
$dns = 'mysql:host=localhost;dbname=bass_player_rank';
$user = 'root';


try {
    $pdo = new PDO($dns, $user, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    throw new Exception($e->getMessage());
}

date_default_timezone_set('Europe/Paris');

return $pdo;
