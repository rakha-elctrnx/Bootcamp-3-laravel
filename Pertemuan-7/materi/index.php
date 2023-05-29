<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $DB = "latihan";

    $connection = mysqli_connect($host, $user, $pass, $DB);

    if (!$connection) {
        echo "Error : " . mysqli_error(mysqli_connect($host, $user, $pass, $DB));
    } else {
        // echo "Berhasil";
    }

    function get_DB() {
        global $connection, $result;
        $q = "SELECT * FROM users";
        $result = mysqli_query($connection, $q);
    }

    get_DB();

    if ($_POST) {
        $nama = $_POST['nama'];
        $hobi = $_POST['hobi'];
        $umur = $_POST['umur'];

        $q2 = "INSERT INTO users (nama, hobi, umur) VALUES ('$nama', '$hobi', '$umur')";
        $result_2 = mysqli_query($connection, $q2);

        if ($result_2) {
            echo 'Berhasil';
            header("Location: index.php");
            exit;
        } else {
            echo 'Error : '. mysqli_error($connection);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input name="nama" placeholder="Nama" type="text"> <br>
        <input name="hobi" placeholder="Hobi" type="text"> <br>
        <input name="umur" placeholder="Umur" type="number"> <br>
        <button>Submit</button>
    </form>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th>Hobi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['hobi'] ?></td>
                <td><?= $row['umur'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>