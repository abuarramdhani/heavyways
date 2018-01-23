<?php
error_reporting(0);
include("Koneksi.php");
include("Session_Cek.php");

$user = $_SESSION['user'];
$q = "SELECT * FROM cart where user='$user'";

$data = mysqli_query($koneksi, $q);
if($_COOKIE["ordersukses"] >= 1){

  ?>
  <script>alert("Order Berhasil, Menunggu Konfirmasi"); <script>
  <?php

}
include("layout.php");
?>
<title>List Order Saya</title>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
 </head>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>

<div class="container up">
  <div class="page-header">
    <h1><span class="glyphicon glyphicon-shopping-cart"></span>  List Order Saya</h1>
  </div>
  <div class="thumbnails">
    <div class="caption">
      <p>Pembayaran Dilakukan Ke No rekening Kami, Jika Pembayaran Sudah Dilakukan, Dimohon untuk Menghubungi kami untuk memproses Order.</p>
    </div>
  </div>
    <div class="row">
      <table class="table table-bordered">
        <thead>
          <th>Nama Alat</th>
          <th>Awal Peminjaman</th>
          <th>Akhir Peminjaman</th>
          <th>Total Pembayaran</th>
          <th>Status Peminjaman</th>
        </thead>
        <tbody>
          <?php
          function status($stat){
            switch ($stat) {
              case '1':
                echo "<button class=\"btn btn-sm btn-primary\">Sedang Di Proses</button>";
                break;
                case '2':
                  echo "<button class=\"btn btn-sm btn-success\">Sedang Anda Gunakan</button>";
                  break;
                  case '1':
                    echo "<button class=\"btn btn-sm btn-danger\">Waktu Peminjaman Habis</button>";
                    break;
            }
          }

           ?>
          <?php while($row = mysqli_fetch_array($data)){ ?>
            <tr>
              <td><?php echo $row['nama_alat']; ?></td>
              <td><?php echo $row['tanggal_pinjam']." ".$row['jam_awal']; ?></td>
              <td><?php echo $row['tanggal_kembali']." ".$row['jam_akhir'];  ?></td>
              <td>Rp. <?php echo number_format($row['total']); ?></td>
              <td><?php echo status($row['status']); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
