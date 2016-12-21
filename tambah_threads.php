<?php
require_once "db/core.php";
cek_session();

if(!$_SESSION['user']){
    echo "<script>alert('silahkan login dulu')</script>".header('location: login.php');
}else{
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forum Stmik Indonesia Banjarmasin</title>
  </head>
  <body>
    <?php require_once "view/link.php"; ?>
  <form class="" action="" method="post">
    <table>
      <td>
        <tr>
          <input type="hidden" name="username" value="<?=$_SESSION['user'];?>">
        </tr>
      </td>
      <tr>
        <td>
          Judul
        </td>
        <td>
          <input type="text" name="judul">
        </td>
      </tr>
      <tr>
        <td>
          Tag
        </td>
        <td>
          <input type="text" name="tag">
        </td>
      </tr>
      <tr>
        <td>
          isi
        </td>
        <td>
          <textarea name="isi" id="text-ckeditor"></textarea>
          <script>CKEDITOR.replace('text-ckeditor');</script>
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" name="upload" value="Upload">
        </td>
      </tr>
    </table>
  </form>

    <a href="profil.php">back</a>
  </body>
</html>
<?php

  if(isset($_POST['upload'])){
      $data_threads = array('judul' => $_POST['judul'],
                            'tag' => $_POST['tag'],
                            'nama_user' => $_POST['username']
                          );
      if(tambah_thread($data_threads)){
        echo "<script>window.alert('data berhasil disimpan')</script>";
      }else{
        echo "<script>window.alert('data gagal tersimpan')</script>";
      }
  }
} ?>
