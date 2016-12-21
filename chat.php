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
      <title></title>
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

        <div class="halaman-chat" >
          <?php
          $query = $koneksi->query("SELECT * FROM chating  ");
          while($result = $query->fetch_assoc()){
            if($_SESSION['user'] == $result['username']){?>
              <p>
                <div class="message">
                  <div id="user">
                    <?= $result['username']; ?>
                  </div>
                  <div id="pesan">
                    <?= $result['isi_chat']; ?>
                  </div>
                  <p><?= $result['waktu']; ?></p>

                </div>
              </p>

            <?php }else{ ?>

              <p>
                <div class="message2">
                  <div id="user">
                    <?= $result['username']; ?>
                  </div>
                  <div id="pesan">
                    <?= $result['isi_chat']; ?>
                  </div>
                  <p><?= $result['waktu']; ?></p>

                </div>
              </p>

          <?php
            }
          } ?>
           <div id="chat">       </div>
        </div>
        <div class="input-chat">
          <input class="isi_pesan" id="input_chat" type="text" name="isi_chat">
          <input class="send" id="submit_chat" type="submit" name="send" value="Send">
        </div>
        <script type="text/javascript">
          $('#submit_chat').on('click',function(){
            var isi = $('#input_chat').val();
            $.ajax({
              method: "POST",
              url: "chat_ajax.php",
              data: { isi_chat : isi },
              success: function(data){
                $('#chat').append(data);
              }
            });
          });
        </script>


    </body>
  </html>

<?php
} ?>
