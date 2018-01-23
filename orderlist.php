<?php
error_reporting(0);
include("Session_Cek.php");
include("Koneksi.php");
$user = $_SESSION['user'];
$q = "SELECT * FROM cart WHERE pemilik='$user' ORDER BY tanggal_pinjam DESC";
$data = mysqli_query($koneksi, $q);
$qdelete = "UPDATE cart SET notified='0' WHERE notified='1' AND pemilik='$user'";
$run = mysqli_query($koneksi, $qdelete);


include("layout.php");
 ?>
 <head>
 	<title>Order List</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css" />
 </head>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
<div class="container up">
  <div class="page-header">
    <h1>Order List</h1>
  </div>
  <div class="row">
    <table class="table table-bordered">
      <thead>
        <th>Nama Pelanggan</th>
        <th>Alat Yang Di Sewa</th>
        <th>Dari Tanggal</th>
        <th>Hingga Tanggal</th>
        <th>Total Pembayaran</th>
        <th>Status Order</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
        function status($stat){
          switch ($stat) {
            case '1':
              echo "<button class=\"btn btn-sm btn-primary\">Sedang Di Proses</button>";
              break;
              case '2':
                echo "<button class=\"btn btn-sm btn-success\">Sedang di Gunakan</button>";
                break;
                case '3':
                  echo "<button class=\"btn btn-sm btn-danger\">Menunggu Pengembalian Alat</button>";
                  break;
          }
        }

        function tombol($id){
          echo "<a href=\"prosesorder.php?id=$id&action=proses\" class=\"btn btn-sm btn-default\">Proses</a>  ";
          echo "<a href=\"prosesorder.php?id=$id&action=kirim\" class=\"btn btn-sm btn-success\">Kirim Alat</a>  ";
          echo "<a href=\"prosesorder.php?id=$id&action=ambil\" class=\"btn btn-sm btn-danger\">Ambil ALat</a>  ";
          echo "<a href=\"prosesorder.php?id=$id&action=selesai\" class=\"btn btn-sm btn-primary\">Selesai</a>  ";
        }
        ?>
        <?php while($row = mysqli_fetch_array($data)) { ?>
        <tr>
          <td><?php echo $row['user']; ?></td>
          <td><?php echo $row['nama_alat']; ?></td>
          <td><?php echo $row['tanggal_pinjam']; ?></td>
          <td><?php echo $row['tanggal_kembali']; ?></td>
          <td>Rp. <?php echo number_format($row['total']); ?></td>
          <td><?php status($row['status']); ?></td>
          <td><?php tombol($row['id']); ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
