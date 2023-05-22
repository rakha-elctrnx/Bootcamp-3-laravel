<?php
    $nama = "Bagas";
    if ($nama == "Bagas") {
        echo "Ini bagas";
    } elseif ($nama === "Nurul") {
        echo "ini nurul";
    } else {
        echo "Tidak ada";
    }
    echo "<br>";
    echo "<br>";

    echo "While";
    echo "<br>";
    $kondisi = 1;
    while ($kondisi < 10) {
        echo "Loop While";
        echo "<br>";
        $kondisi++;
    }
    
    echo "<br>";
    
    echo "For";
    echo "<br>";
    for ($i=0; $i < 10; $i++) { 
        echo "Loop Fpr";
        echo "<br>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <h1><?= $nama ?></h1>
    <? 
    if ($nama === "Bagas") {
        echo "Selamat datang cowo";
    } elseif ($nama === "Nurul") {
        echo "Selamat datang cewe";
    } else {
        echo"Selamat datang";
    }
     ?>

    <ul>
        <? for ($i=0; $i < 10; $i++) { ?>
        <li>List Ke-<?= $i ?></li>            
        <? } ?>
    </ul>
</body>
</html>