<?php
include("Koneksi.php");
$username = $_GET['username'];
$q = "DELETE FROM daftar WHERE user='$username'";
$hasil = mysqli_query($koneksi, $q);
if($hasil){
  header("Location: Perusahaanlist.php");
}
else {
  echo "Gagal Hapus data";
}

 ?>
