<?php

include("Koneksi.php");
include("Session_Cek.php");
if(isset($_POST['submit'])){
$id = $_POST['id'];
$tglawl = $_POST['starttime'];
$tglakhr = $_POST['endtime'];
$jamawal = $_POST['jamawal'];
$jamakhir = $_POST['jamakhir'];

function hitungtanggal($awal, $akhir){
  $awal = strtotime($awal);
  $akhir = strtotime($akhir);

  return abs(($akhir - $awal)/(24*3600));
}

function hitungjam($awal, $akhir){
  list($jamawal, $menitawal) = split(":", $awal);
  list($jamakhir, $menitakhir) = split(":", $akhir);
  $hasil = ((int) $jamawal - (int) $jamakhir);
  return $hasil;

}
$jam = hitungjam($jamakhir, $jamawal);
$totalwktu = hitungtanggal($tglawl, $tglakhr);
$q = "SELECT tarif,nama_alat FROM alat_db WHERE id='$id'";
$run = mysqli_query($koneksi, $q);
$data = mysqli_fetch_array($run);
$totalbyar = ((($totalwktu * 24)) + $jam) * $data['tarif'];
setcookie("waktu", $totalwktu);
setcookie("from", $tglawl);
setcookie("to", $tglakhr);
setcookie("total", $totalbyar);
setcookie("jam", ($jam));
setcookie("id", $id);
setcookie("jamawal", $jamawal);
setcookie("jamakhir", $jamakhir);
include("layout.php");
}
 ?>
 <head>
 	<link rel="stylesheet" href="css/bootstrap.min.css" />
 </head>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
<title>Proses Order</title>
<div class="container up">
  <div class="row">
    <div class="col-lg-6">
      <div class="page-header">
        <h1>Proses Order</h1>
      </div>
      <table class="table table-bordered">
        <tr>
          <td width="200px"><b>Nama Barang :</b></td>
          <td><?php echo $data['nama_alat']; ?></td>
        </tr>
        <tr>
          <td width="200px"><b>Durasi Sewa :</b></td>
          <td width="200px"><?php echo $totalwktu; ?> Hari <?php echo $jam; ?> Jam</td>
        </tr>
        <tr>
          <td width="200px"><b>Dari :</b></td>
          <td><?php echo $tglawl; ?> (Tahun/Bulan/Tanggal) <?php echo $jamawal; ?></td>
        </tr>
        <tr>
          <td width="200px"><b>Sampai Dengan :</b></td>
          <td><?php echo $tglakhr; ?> (Tahun/Bulan/Tanggal) <?php echo $jamakhir; ?></td>
        </tr>
        <tr>
          <td width="200px"><b>Total Pembayaran :</b></td>
          <td>Rp. <?php echo number_format($totalbyar); ?></td>
        </tr>
        <tr>
          <td width="200px"><b></b></td>
          <td><a href="process.php" class="btn btn-md btn-primary">Tambahkan Order</a></td>
        </tr>
      </table>
    </div>
  </div>
</div>
