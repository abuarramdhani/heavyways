<?php
    setcookie('success', '');
    session_start();
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
  include('layout.php');
?>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<title>Daftar Manajement Perusahaan</title>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
if(isset($_COOKIE['success'])){ ?>
<script>
swal('Sukses',"Data Berhasil Diperbaharui",'success');
<script>
<?php }?>
<div class="container up">
  <div class="row">
    <div class="page-header">
      <h1>Manajement Perusahan</h1>
    </div>
    <table class="table">
      <thead>
        <th>Nama Perusahaan</th>
        <th>Alamat Perusahaan</th>
        <th>Nama User</th>
        <th>Status Perusahaan</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)){ ?>

        <tr>
          <td><?php echo $row['nama_perusahaan']; ?></td>
          <td><?php echo $row['alamat']; ?></td>
          <td><?php echo $row['user']; ?></td>
          <td><?php echo $row['grant_user']; ?></td>
          <?php if($_SESSION['user_level'] == "Admin") { ?>
          <td><a style="margin-right: 10px;" href="hapusperusahaan.php?username=<?php echo $row['user']; ?>" class="btn btn-sm btn-danger">Hapus</a><a href="editperusahaan.php?user=<?php echo $row['user']; ?>" class="btn btn-sm btn-primary">Edit</a></td>
          <?php } ?>
        <?php if($_SESSION['user_level'] != "Admin") { ?>
          <td><a style="margin-right: 10px;" href="profilperusahaan.php?user=<?php echo $row['user']; ?>" class="btn btn-sm btn-success">Cek Profil</a></td>
          <?php } ?>
        </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  <?php
  if($_COOKIE['successdaftar'] == 1){
	echo "<script>swal('Sukses', 'Perusahaan Berhasil Ditambahkan', 'success');</script>";
  setcookie('successdaftar', '');
  
}
?>
</div>
