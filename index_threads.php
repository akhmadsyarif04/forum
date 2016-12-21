<?php
require_once "db/core.php";

cek_session();

if(!$_SESSION['user']){
    echo "<script>alert('silahkan login dulu')</script>".header('location: index.php');
}else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>STMIK INDONESIA BANJARMASIN</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="view/style.css" media="screen" type="text/css">

  </head>
  <body>
    <?php
    $user = $_SESSION['user'];
    $result = tampilkan($user);
    $hasil = $result->fetch_assoc();
    ?>
    <div class="header-user">
      <img class="fotoprofil" src="foto_user/<?= $hasil['foto']; ?>" alt="" height="50px" width="50px">
      <?= $hasil['nama_user'];?>
      <a href="logout.php">Logout</a>
      <!-- <a href="tambah_threads.php">Buat Threads</a> -->
    </div>

    <div class="">

    </div>
  </body>
</html>
<?php
}
?>
