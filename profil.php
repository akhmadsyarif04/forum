<?php
require_once "db/core.php";

cek_session();

if(!$_SESSION['user']){
    echo "<script>alert('silahkan login dulu')</script>".header('location: index.php');
}else{
?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="view/style.css" media="screen" type="text/css">

  </head>
  <body>
    <div class="halaman_user">
      <div class="datauser">
        <div class="header-user">
          <a href="logout.php">Logout</a>
          <a href="tambah_threads.php">Buat Threads</a>
        </div>

        <div class="profil">
          <p>
          Hi, Apa kabar
          <?php
          $user = $_SESSION['user'];
          $result = tampilkan($user);
          $hasil = $result->fetch_assoc();
            echo $hasil['nama_user']." !</p>"?>
            <br>
            <p>
              <center>
                <img class="fotoprofil" src="foto_user/<?= $hasil['foto']; ?>" alt="" height="200px" width="200px">
              </center>
            </p>
          <div class="biodatauser">
            Biodata :
            <table>
              <?=
                "<tr>
                  <td>
                    Username
                  </td>
                  <td>
                    :
                  </td>
                  <td>"
                    .$hasil['username'].
                  "</td>
                </tr>
                <tr>
                  <td>
                    Email
                  </td>
                  <td>
                    :
                  </td>
                  <td>"
                    .$hasil['email'].
                  "</td>
                </tr>
                <tr>
                  <td>
                    Jenis Kelamin
                  </td>
                  <td>
                    :
                  </td>
                  <td>"
                    .$hasil['jenis_kelamin'].
                  "</td>
                </tr>
                <tr>
                  <td>
                    Alamat
                  </td>
                  <td>
                    :
                  </td>
                  <td>"
                    .$hasil['Alamat'].
                  "</td>
                </tr>";
              ?>
            </table>
          </div>
        </div>

        <?php require_once "chat.php"; ?>

      </div>
    </div>



  </body>
</html>

<?php } ?>
