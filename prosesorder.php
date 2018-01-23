<?php
include("Session_Cek.php");
include("Koneksi.php");
$id = $_GET['id'];
$action = $_GET['action'];

function aksi($act){
  switch ($act) {
    case 'proses':
      $id = $_GET['id'];
      $q = "UPDATE cart SET status='1' WHERE id='$id'";
      return $q;
      break;
    case 'kirim':
      $id = $_GET['id'];
      $q = "UPDATE cart SET status='2' WHERE id='$id'";
      return $q;
      break;
    case 'ambil':
    $id = $_GET['id'];
      $q = "UPDATE cart SET status='3' WHERE id='$id'";
      return $q;
      break;
    case 'selesai':
    $id = $_GET['id'];
      $q = "DELETE FROM cart WHERE id='$id'";
      return $q;
      break;
    default:
      return "Aksi Tidak Dikenal";
      break;
  }
}

if($action == "selesai"){
$qalat = "SELECT idalat FROM cart WHERE id='$id'";
$runalat = mysqli_query($koneksi, $qalat);
$hasilalat = mysqli_fetch_array($runalat);
$idbar = $hasilalat['idalat'];

$newq = "SELECT jumlah FROM alat_db WHERE id='$idbar'";
$newrun = mysqli_query($koneksi, $newq);
$newarr = mysqli_fetch_array($newrun);
$newjum = $newarr['jumlah'];

$updtjml = $newjum + 1;
$qdate = "UPDATE alat_db SET jumlah='$updtjml' WHERE id='$idbar'";
$qrun = mysqli_query($koneksi, $qdate);
if(!$qrun){
  echo "Error To Update";
}

}
$run = mysqli_query($koneksi, aksi($action));
if($run){
  setcookie("ordersukses", 1);
  header("Location: orderlist.php");
}
else {
  echo "error Database";
}

?>
