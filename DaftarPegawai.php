<?php
	session_start();
	if($_SESSION['user_level'] != "Admin"){
		header('Location: Homepage.php');
	}
	include("Koneksi.php");
	$sql = "SELECT * FROM pegawai";
	$result = mysqli_query($koneksi, $sql);
	$nilai;
	include("layout.php");
?>

<head>
	<title>List Pegawai</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container up">
	<div class="page-header">
		<h1>List Pegawai</h1>
	</div>
	<table class="table table-bordered">
		<thead>
			<th>Nama Lengkap</th>
			<th>Organisasi</th>
			<th>Posisi Pekerjaan</th>
			<th>Nama Pekerjaan</th>
			<th>Nama Perusahaan</th>
			<th>Action</th>
		</thead>
		<?php while($row = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php echo $row['nama_depan']." ".$row['nama_belakang']; ?></td>
				<td><?php echo $row['organization']; ?></td>
				<td><?php echo $row['job_position']; ?></td>
				<td><?php echo $row['job_title']; ?></td>
				<td><?php echo $row['company_work']; ?></td>
				<td><a class="btn btn-xs btn-danger" href="DeletePegawai.php?namadpn=<?php echo $row['nama_depan'].'&namablk='.$row['nama_belakang']; ?>">Hapus</a></td>
			</tr>
		<?php } ?>
	</table>
</div>
