<?php
function run($query){
  global $koneksi;
  $run_query = $koneksi->query($query);
  return ($run_query);
}

function tampilkan($user){
  $query = "SELECT * FROM users WHERE username='$user'";
  return run($query);
}

function daftar($daftar){
  $kunci = implode(", ", array_keys($daftar));
  $i = 0;
  foreach ($daftar as $key => $value) {
      if (is_int($value)) {
          $nilaidata[$i] = $value;
      } else {
          $nilaidata[$i] = "'" . $value . "'";
      }
      $i++;
  }
  $nilai = implode(",", $nilaidata);
  $asalfoto = $_FILES['foto']['tmp_name'];
  $namafoto = $_FILES['foto']['name'];
  move_uploaded_file($asalfoto, "foto_user/".$namafoto);
  $query = "INSERT INTO users ($kunci) VALUES ($nilai)";
  return run($query);
}

function hashpassword($password){
  $pass = password_hash($password, PASSWORD_DEFAULT);
  return ($pass);
}

function cek_session(){
  if (!isset($_SESSION['user'])){
    $_SESSION['user'] = null;
  }
}
?>
