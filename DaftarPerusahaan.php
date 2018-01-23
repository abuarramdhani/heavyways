<?php
	include("Koneksi.php");
	include("Session_Cek");
	session_start();
	if(!$_SESSION['user_level'] == "Admin"){
		header("Location: login.php");
		setcookie('belumlogin', '1');
	}
	$sql = "SELECT * FROM daftar";
	$result = mysqli_query($koneksi, $sql);
	$nilai;
	include('layout.php');

?>
<html>
<head>
	<title>Register Perusahaan</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container up">
	<div class="page-header">
		<h1>Register Perusahaan</h1>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<form action="InsertDaftarP.php" id="register_form" method="post">
				<div class="form-group">
					<label for="nama">Nama Perusahaan</label>
					<input type="text" class="form-control" id="nama" name="nama" />
				</div>
				<div class="form-group">
					<label for="alamat">Alamat Perusahaan</label>
					<input type="text" class="form-control" id="alamat" name="alamat" />
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="user" />
				</div>
				<div class="form-group">
					<label for="pass">Password</label>
					<input type="password" class="form-control" id="pass" name="password" />
				</div>
				<div class="form-group">
				    <label for="email">Email</label>
					<input type="text" class="form-control" name="email" id="email" />
					<label for="nomor">Nomor Telepon</label>
					<input type="text" class="form-control" name="nomor" id="nomor" />
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
					<label for='photo'>Photo/Logo</label>
					<input type="file" name="file" id="photo" />
				</div>
				<div class="form-group">
					<input type="submit" value="Register!" name="register" class="btn btn-md btn-info" />
				</div>
			</form>
		</div>
	</div>
</div>




</html>
