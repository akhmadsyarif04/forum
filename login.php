<?php
require_once "db/core.php";

cek_session();

if($_SESSION['user']){
  header('location: chat.php');
}else{

$error = "";
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Silahkan Login</title>
  </head>
  <body>
    Silahkan Login
    <form class="login" action="" method="post">
      <table>
        <tr>
          <td>
            Username
          </td>
          <td>
            :
          </td>
          <td>
            <input id="login" type="text" name="username">
          </td>
        </tr>
        <tr>
          <td>
            Password
          </td>
          <td>
            :
          </td>
          <td>
            <input id="login" type="password" name="password">
          </td>
        </tr>
        <tr>
          <td>
            <input id="submit"  type="submit" name="login" value="Login">
          </td>
        </tr>
        <?= $error ?>
      </table>
    </form>
    Lakukan Register <a href="register.php">disini</a>

  </body>
</html>
<?php
if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  if(!empty(trim($username)) && !empty(trim($password))){
    $username = escape($username);
    $password = escape($password);

    $hasil = $koneksi->query("SELECT * from users WHERE username='$username' ");
    $data = $hasil->fetch_assoc();
    $hash = $data['password'];
    $id = $data['status'];

    $verify = password_verify($password,$hash);
    if($verify){
      if($id == 1){
      $_SESSION['user'] = $username;
      header('location: chat.php');
      }else{
        $error = "cek kembali username dan password anda";
      }
    }else{
      $error =  "cek kembali username dan password anda";
    }
  }else{
    $error =  "mohon form jangan dikosongkan";
  }
}
//end if session user
}
?>
