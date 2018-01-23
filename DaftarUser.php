<?php

    session_start();
    require('Session_Cek.php');
    if($_SESSION['user_level'] != 'Admin'){
        header("Location: Homepage.php");
        session_destroy();
    }
    /*
	$usr = "root";
	$pas = "ibte";
	$lokasi_db = "localhost";
	$nama_db = "heavyways";

	$koneksi = mysqli_connect($lokasi_db, $usr, $pas, $nama_db, 3306);
	mysqli_select_db($koneksi, $nama_db);
	$sql = "SELECT * FROM daftar";
	$result = mysqli_query($koneksi, $sql);
	$nilai;
    */

    require('Koneksi.php');
    $sql = "SELECT nama_perusahaan,alamat,user,grant_user FROM daftar where grant_user='vendor'";
	$result = mysqli_query($koneksi, $sql);
	$nilai;
?>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<title>Company List Manager</title>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<div class="container">
  <div class="row">
    <table class="table">
      <thead>
        <th>Nama Perusahaan</th>
        <th>Alamat Perusahaan</th>
        <th>Nama User</th>
        <th>Status Perusahaan</th>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)){ ?>

        <tr>
          <td><?php echo $row['nama_perusahaan']; ?></td>
          <td><?php echo $row['alamat']; ?></td>
          <td><?php echo $row['user']; ?></td>
          <td><?php echo $row['grant_user']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
</div>
