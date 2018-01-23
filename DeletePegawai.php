<?php
include("Koneksi.php");

$namadepan = $_GET['namadpn'];
$namabelakang = $_GET['namablk'];

$q = "DELETE FROM pegawai WHERE nama_depan = '$namadepan' AND nama_belakang = '$namabelakang'";

if(mysqli_query($koneksi, $q)){
  header("Location: DaftarPegawai.php");
}
else {
  echo "Error To Delete File, Check Database Connection Or Configuration, Make sure it works properly";
}

 ?>
