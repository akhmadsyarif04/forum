<?php
require_once "db/core.php";
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="view/style.css" media="screen" type="text/css">
  </head>
  <body>
    <center>
    <div class="hal-register">
      <form action="" method="POST" enctype="multipart/form-data">
        <table>
          <tr>
            <td>
              Nama Lengkap
            </td>
            <td>
              <input type="text" name="name" placeholder="Nama Lengkap">
            </td>
          </tr>
          <tr>
            <td>
              Username
            </td>
            <td>
              <input type="text" name="username" placeholder="Username">
            </td>
          </tr>
          <tr>
            <td>
              Password
            </td>
            <td>
              <input type="password" name="password" placeholder="Password">
            </td>
          </tr>
          <tr>
            <td>
              Email
            </td>
            <td>
              <input type="email" name="email" placeholder="Email">
            </td>
          </tr>
          <tr>
            <td>
              Jenis Kelamin
            </td>
            <td>
              <input type="radio" name="gender" value="Laki-Laki" checked>Laki-Laki<br>
              <input type="radio" name="gender" value="Perempuan">Perempuan<br>
              <input type="radio" name="gender" value="DLL">DLL
            </td>
          </tr>
          <tr>
            <td>
              Alamat
            </td>
            <td>
              <textarea name="alamat" rows="8" cols="40"></textarea>
            </td>
          </tr>
          <tr>
            <td>
              Foto
            </td>
            <td>
              <input type="file" name="foto">
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="daftar" value="Daftar">
            </td>
          </tr>
        </table>
      </form>
    </div>
  </center>
  </body>
</html>
<?php
if(isset($_POST['daftar'])){
  $passhash = hashpassword($_POST['password']);
  $daftar = array(
                  'nama_user' => $_POST['name'],
                  'username' => $_POST['username'],
                  'password' => $passhash,
                  'email' => $_POST['email'],
                  'alamat' => $_POST['alamat'],
                  'jenis_kelamin' => $_POST['gender'],
                  'foto' => $_FILES['foto']['name'],
                  'status' => 1
                );
  if(daftar($daftar)){
    echo "<script>window.alert('data berhasil disimpan')</script>";
  }else{
    echo "data gagal tersimpan";
  }
}
// echo $_FILES['foto']['tmp_name'];
?>
