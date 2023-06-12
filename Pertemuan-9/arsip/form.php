<?php
    $koneksi = mysqli_connect("localhost", "root", "", "bootcamp");

    if(!$koneksi) {
        echo "Error : " . mysqli_error(mysqli_connect("localhost", "root", "", "latihan"));
    }

    function get_buku($id_buku) {
      global $koneksi, $buku;
      $buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id_buku");
    }

    if (isset($_GET['id'])) {
      $id_buku = $_GET['id'];
      $title = 'Edit Buku';
      $field = '<input type="text" style="display: none;" class="form-control" name="id" value="'.$id_buku.'" />';
      get_buku($id_buku);
      while ($row = mysqli_fetch_assoc($buku)) {
        $nama = $row["nama"];
        $nama = $row["judul"];
        $nama = $row["tema"];
        $nama = $row["email"];
      }
    } else {
      $title = 'Tambah Buku';
    }
    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan CRUD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
  </head>
  <body>
    <div class="container w-50">
    <h1 class="mt-5 mb-5"><?= $title ?></h1>
    <form action="index.php" method="POST">
        <div class="mb-3 ">
            <label class="form-label">Nama</label>
            <?= $field ?? '' ?>
            <input type="text" class="form-control" name="nama" value="<?= $nama ?? '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" value="<?= $judul ?? '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Tema</label>
            <select class="form-select" name="tema">
                <option selected>Open this select menu</option>
                <option value="Fiksi">Fiksi</option>
                <option value="Sains">Sains</option>
                <option value="Action">Action</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $email ?? '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>