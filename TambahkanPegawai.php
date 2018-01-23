<?php
	session_start();
	include("Koneksi.php");
	$sql = "SELECT * FROM alat_db";
	$qwork = "SELECT nama_perusahaan FROM daftar WHERE grant_user = 'vendor' OR grant_user = 'Admin'";
	$tempat = mysqli_query($koneksi, $qwork);
	$result = mysqli_query($koneksi, $sql);
  $nilai;
	include('layout.php');
	if(!isset($_SESSION['user_level']) || $_SESSION['user_level'] != "Admin"){
		header('Location: Homepage.php');
	}
?>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container up">
	<div class="page-header">
		<h1>Tambah Pegawai</h1>
	</div>
                <form method="post" action="insertPegawai.php">
														<div class="form-group">
																<label for="NamaDepan">Nama Depan</label>
                                <input type="text" class="form-control" id="NamaDepan" name="NamaDepan" placeholder="Nama Depan" />
															</div>
															<div class="form-group">
																<label for="NamaBelakang">Nama Belakang</label>
                               <input type="text" id="NamaBelakang" class="form-control" name="NamaBelakang" placeholder="Nama Belakang" />
														 </div>
														 <div class="form-group">
															 <label for="Organization">Organisasi</label>
                                <input type="text" class="form-control" id="Organization" name="Organization" placeholder="Organization" />
															</div>
															<div class="form-group">
																<label for="Posisi">Posisi</label>
                                <input type="text" id="Posisi" class="form-control" name="JobPosition" placeholder="Job Position" />
															</div>
															<div class="form-group">
																<label for="JobTitle">Nama Pekerjaan</label>
																<input type="text" id="JobTitle" class="form-control" name="JobTitle" placeholder="Job Title" />
															</div>
															<div class="form-group">
																<label for="CompanyWork">Nama Perusahaan</label><br>
																<select name="CompanyWork">
																	<?php while ($row = mysqli_fetch_array($tempat)) {

																	?>
																	<option value="<?php echo $row['nama_perusahaan']; ?>"><?php echo $row['nama_perusahaan']; ?>	</option>
																	<?php } ?>
																</select>
															</div>
															<div class="form-group">
                                <input type="submit" onclick="submit()" class="btn btn-md btn-success" value="Tambahkan" />
															</div>
                        </form>
</div>
