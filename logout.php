<?php
require_once "db/core.php";

// $login = false;
//
// cek_session();

if(!$_SESSION['user']){
  header('location: index.php');
}else{

unset($_SESSION['user']);
session_destroy();

header('location: index.php');
}
