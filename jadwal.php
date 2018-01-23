<?php
session_start();
include("Koneksi.php");
$q = "SELECT * FROM cart ORDER BY tanggal_pinjam DESC";
$data = mysqli_query($koneksi, $q);

include("layout.php");
 ?>
 <head>
 	<title>Jadwal Sewa Alat</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css" />
 </head>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
<div class="container up">
  <div class="page-header">
    <h1>Jadwal Sewa</h1>
  </div>
  <div class="row">
    <table class="table table-bordered">
      <thead>
        <th>Nama Pelanggan</th>
        <th>Alat Yang Di Sewa</th>
        <th>Dari Tanggal</th>
        <th>Hingga Tanggal</th>
        <th>Status Order</th>
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
        ?>
        <?php while($row = mysqli_fetch_array($data)) { ?>
        <tr>
          <td><?php echo $row['user']; ?></td>
          <td><?php echo $row['nama_alat']; ?></td>
          <td><?php echo $row['tanggal_pinjam']; ?></td>
          <td><?php echo $row['tanggal_kembali']; ?></td>
          <td><?php status($row['status']); ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
