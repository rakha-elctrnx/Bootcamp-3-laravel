<?php

    $koneksi = mysqli_connect("localhost", "root", "", "bootcamp");

    if(!$koneksi) {
        echo "Error : " . mysqli_error(mysqli_connect("localhost", "root", "", "latihan"));
    }

    function get_buku() {
        global $id, $koneksi, $buku;
        $buku = mysqli_query($koneksi, "SELECT * FROM buku");
    }

    get_buku();

    if ($_POST) {
        
        $nama = $_POST['nama'];
        $judul = $_POST["judul"];
        $tema = $_POST["tema"];
        $email = $_POST["email"];

        if ($_POST["id"] ?? '') {
            $id_books = $_POST["id"];
            $action = mysqli_query($koneksi, "UPDATE buku  SET nama='$nama', judul='$judul', tema='$tema', email='$email' WHERE id=$id_books");
        } else {
            $action = mysqli_query($koneksi, "INSERT INTO buku (nama, judul, tema, email) values ('$nama', '$judul', '$tema', '$email')");
        }

        if ($action) {
            get_buku(); 
        } else {
            echo "Error :" . mysqli_error($koneksi);
        }
    } elseif ($_GET['delete'] ?? '') {
        $id_hapus = $_GET['delete'];
        $hapus = mysqli_query($koneksi, "DELETE FROM buku WHERE id=$id_hapus");

        if ($hapus) {
            get_buku(); 
        } else {
            echo "Error :" . mysqli_error($koneksi);
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    
  </head>
  <body>
    <div class="container">
        <br>
        <h1>Penulis Risa Nussy</h1>
        <br>
        <!-- Button trigger modal -->
        <a href="./form.php" class="btn btn-primary" >
        <i class="fa-solid fa-book"></i> Tambah Buku
        </a>

        <!-- Modal -->
        

        <br><br><br>
    
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($buku)) { ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['tema'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <a href="./form.php?id=<?= $row['id'] ?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
        </table>


    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
  </body>
</html>