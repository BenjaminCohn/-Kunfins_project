<?php

$artiste1 = $_GET['artiste1'] ?? null;
$artiste2 = $_GET['artiste2'] ?? null;
$artiste3 = $_GET['artiste3'] ?? null;
$artiste4 = $_GET['artiste4'] ?? null;
$artiste5 = $_GET['artiste5'] ?? null;

$get_array = [
    $artiste1,
    $artiste2,
    $artiste3,
    $artiste4,
    $artiste5,
];

function filter_duplicate($get_array)
{
    $dupe_array = array();
    foreach ($get_array as $get) {
        if (++$dupe_array[$get] > 1) {
            return true;
        }
    }
    return false;
}

if ($artiste1 === 'artiste1' || $artiste2 === 'artiste2' || $artiste3 === 'artiste3' || $artiste4 === 'artiste4' || $artiste5 === 'artiste5' || filter_duplicate($get_array)) {
    $previous = "javascript:history.go(-1)";
        header('location:' . $previous);
} else {
    header('location: ./creation_TLS.php?artiste1=' . $artiste1 . '&artiste2=' . $artiste2 . '&artiste3=' . $artiste3 . '&artiste4=' . $artiste4 . '&artiste5=' . $artiste5);
}
?>