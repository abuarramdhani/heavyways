<?php
	include("Koneksi.php");
	$sql = "SELECT * FROM daftar";
	$result = mysqli_query($koneksi, $sql);
	$nilai;
	include('layout.php');
?>
<html>
<style>
.rata {
	margin: auto;
}
</style>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<script src="js/jquery.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container up">
	<div class="page-header">
		<h1>Register</h1>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<form action="InsertDaftar.php" method="post">
				<div class="form-group">
					<label for="nama">Nama Anda</label>
					<input type="text" class="form-control" id="nama" name="Nama" />
				</div>
				<div class="form-group">
					<label for="alamat">Alamat Anda</label>
					<input type="text" class="form-control" id="alamat" name="Alamat" />
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="Username" />
				</div>
				<div class="form-group">
					<label for="pass">Password</label>
					<input type="password" class="form-control" id="pass" name="Password" />
				</div>
				<div class="form-group">
					<label for="quest">Pertanyaan Keamanan</label>
					<select class="form-control selectpicker" name="question">
					<option value="Siapakah Nama Ibu Anda ?">Siapa Kah Nama Ibu anda ?</option>
					<option value="Siapakah Nama Teman Terbaik Anda ?">Siapakah Nama Teman Terbaik Anda ?</option>
					<option value="Siapakah Nama Guru Terbaik Anda ?">Siapakah Nama Guru Terbaik Anda ?</option>
					</select>
				</div>
				<div class="form-group">
					<label for="answer">Jawaban</label>
					<input type="text" class="form-control" id="answer" name="answer" />
				</div>
				<div class="form-group">
					<input type="submit" value="Register!" name="register" class="btn btn-md btn-success" />
				</div>
			</form>
		</div>
		<div class="col-lg-6">
			<div class="thumbnail rata" style="width: 300px;">
				<div class="caption text-center">
					<p>Untuk Mendaftar Sebagai Vendor Penyedia alat, anda harus mendaftar langsung kepada kami, anda dapat langsung datang ke Kantor Kami, Atau Melalui Email, lalu anda wajib mengisi form yg kami berikan</p>
				</div>
			</div>
		</div>
	</div>
</div>




</html>
