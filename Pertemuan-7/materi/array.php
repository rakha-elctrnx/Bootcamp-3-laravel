<?php
    
    // Array
    // $datas = ["Risa", 17, 'nonton', true];

    // foreach ($datas as $data) {
    //     echo $data;
    //     echo "<br>";
    // }

    // Multi Dimensional Array
    // $datas = [
    //     ["Bagas", 17, 'nonton', true],
    //     ["Risa", 15, 'game', false],
    //     ["Nurul", 16, 'masak', true],
    // ];
    
    // foreach ($datas as $data) {
    //     foreach ($data as $item) {
    //         echo "$item";
    //         echo "<br>";
    //     }
    // }

    // Associative Array
    // $datas = [
    //     "nama" => "Risa Nussi",
    //     "umur" => 17,
    //     "hobi" => 'nonton',
    //     "pria" => true
    // ];

    // echo $datas['nama'];

    $datas = [
        ["nama" => "Rissa Nussy", "umur" => 17, "hobi" => 'Nonton', "pria" => true],
        ["nama" => "Nurul Hasanah", "umur" => 15, "hobi" => 'Masak', "pria" => false],
        ["nama" => "Ali", "umur" => 17, "hobi" => 'Makan', "pria" => true],
    ]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th>Hobi</th>
            <th>Jenis Kelamin</th>
        </tr>
        <?php 
            foreach ($datas as $data) {
                echo "<tr>";
                foreach ($data as $item) {
                    echo "<td>$item</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>