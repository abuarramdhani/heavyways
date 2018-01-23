<?php
include("Koneksi.php");
include("Session_Cek.php");

$id = $_COOKIE['id'];
$waktu = $_COOKIE['waktu'];
$from = $_COOKIE['from'];
$to = $_COOKIE['to'];
$total = $_COOKIE['total'];
$user = $_SESSION['user'];
$jamawal = $_COOKIE['jamawal'];
$jamakhir = $_COOKIE['jamakhir'];
$jam = $_COOKIE['jam'];
$qalat = "SELECT nama_alat,owner,jumlah from alat_db where id='$id'";
$resalat = mysqli_query($koneksi, $qalat);
$hasil = mysqli_fetch_array($resalat);
$nama = $hasil['nama_alat'];
$pemilik = $hasil['owner'];
$jumlah = $hasil['jumlah'];
$jumlahbaru = $jumlah - 1;

$q = "INSERT INTO cart (idalat, user, nama_alat, tanggal_pinjam, tanggal_kembali, total, pemilik, status, jam_awal, jam_akhir, jam, notified) VALUES ('".$id."', '".$user."', '".$nama."', '".$from."', '".$to."', '".$total."', '".$pemilik."', '1', '".$jamawal."', '".$jamakhir."', '".$jam."', '1')";
$rundb = mysqli_query($koneksi, $q);
 if($rundb){
  $qjum = "UPDATE alat_db SET jumlah='$jumlahbaru' WHERE id='$id'";
  mysqli_query($koneksi, $qjum);
  setcookie("waktu", "");
  setcookie("from", "");
  setcookie("to", "");
  setcookie("total", "");
  setcookie("id", "");
  setcookie("jam", "");
  setcookie("jamawal", "");
  setcookie("jamakhir", "");
  header("Location: OrderSaya.php");
}




 ?>
