<?php
require_once "db/core.php";
cek_session();
if(!$_SESSION['user']){
    echo "<script>alert('silahkan login dulu')</script>".header('location: index.php');
}else{
$username = $_SESSION['user'];

$chat = mysqli_real_escape_string($koneksi,$_POST['isi_chat']);

$query = $koneksi->query("INSERT INTO chating (username,isi_chat) VALUES ('$username','$chat') ");
  if($query){
    $query_tampil = $koneksi->query("SELECT * FROM chating  ORDER BY id_chat DESC LIMIT 1 ");
   while($result = $query_tampil->fetch_assoc()){ ?>
     <div class="message">
       <div id="user">
         <?= $result['username']; ?>
       </div>
       <div id="pesan">
         <?= $result['isi_chat']; ?>
       </div>
       <p><?= $result['waktu']; ?></p>
     </div>
  <?php
    }
  }else{
    echo "gagal";
  }

}
?>
