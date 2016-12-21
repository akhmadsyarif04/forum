<?php
function escape($data){
  global $koneksi;
  return $koneksi->real_escape_string($data);
}

function tambah_thread($data_threads){
  $kunci = implode(", ", array_keys($data_threads));
  $i = 0;
  foreach ($data_threads as $key => $value) {
      if (is_int($value)) {
          $nilaidata[$i] = $value;
      } else {
          $nilaidata[$i] = "'" . $value . "'";
      }
      $i++;
  }
  $nilai = implode(",", $nilaidata);
  $query = "INSERT INTO threads ($kunci) VALUES ($nilai)";
  return run($query);
}

?>
