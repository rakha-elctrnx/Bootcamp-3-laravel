<?php

    $koneksi = mysqli_connect("localhost", "root", "", "latihan");

    if(!$koneksi) {
        echo "Error : " . mysqli_error(mysqli_connect("localhost", "root", "", "latihan"));
    }

    $hasil = mysqli_query($koneksi, "SELECT * FROM users WHERE id=1");

    while ($row = mysqli_fetch_assoc($hasil)) {
        $id = $row["id"];
        $nama = $row["nama"];
    }

    function get_buku() {
        global $id, $koneksi, $buku;
        $buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_users=$id");
    }

    get_buku();

    if ($_POST) {
        
        $judul = $_POST["judul"];
        $tema = $_POST["tema"];

        if ($_POST["id"] ?? '') {
            $id_books = $_POST["id"];
            var_dump($id_books);
            $action = mysqli_query($koneksi, "UPDATE buku  SET judul='$judul', tema='$tema' WHERE id=$id_books");
        } else {
            $action = mysqli_query($koneksi, "INSERT INTO buku (judul, tema, id_users) values ('$judul', '$tema', '$id')");
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
        <i class="fa-solid fa-book"></i> Tambah Buku
        </button>

        <!-- Modal -->
        

        <br><br><br>
    
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($buku)) { ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['tema'] ?></td>
                        <td>
                            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#edit_<?= $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                            <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                        <!-- modal -->
                    <div class="modal fade" id="edit_<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Buku</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Judul</label>
                                <input type="number" value="<?= $row['id'] ?>" name="id" style="display: none;">
                                <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $row['judul'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tema</label>
                                <input name="tema" type="text" class="form-control" id="exampleInputPassword1" value="<?= $row['tema'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>

                        </div>
                    </div>
                    </div>
                    <?php } ?>
                </tbody>
        </table>

        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Judul</label>
                    <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tema</label>
                    <input name="tema" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>

            </div>
        </div>
        </div>


    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>   -->
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