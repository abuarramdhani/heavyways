<?php
include('Session_Cek.php');
if(isset($_GET['user'])){
include("Koneksi.php");
$user = $_GET['user'];
if($_SESSION['user_level'] != 'Admin'){
    setcookie('belumlogin', 1);
    header('Location: index.php');
}

$q = "SELECT * FROM daftar WHERE user='$user'";
$run = mysqli_query($koneksi,$q);

include('layout.php');
}

 ?>

<html>
<head>
 	<title>Edit Perusahaan</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css" />
 </head>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script><div class="container up">

<div class="container">
    <div class="col-lg-6">
        <div class="page-header">
            <h1> Edit : <?php echo htmlspecialchars($user) ?>
        </div>
        <form name="edit" method="post" action="updatecompany.php">
        <?php while($row = mysqli_fetch_array($run)){ ?>
            <div class="form-group">
					<label for="nama">Nama Anda</label>
					<input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama_perusahaan']; ?>" />
				</div>
				<div class="form-group">
					<label for="alamat">Alamat Anda</label>
					<input type="text" class="form-control" id="alamat" value="<?= $row['alamat']; ?>" name="alamat" />
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" value="<?= $row['user']; ?>" name="user" />
				</div>
				<div class="form-group">
				    <label for="email">Email</label>
					<input type="text" class="form-control" name="email" id="email" value="<?= $row['email']; ?>"/>
					<label for="nomor">Nomor Telepon</label>
					<input type="text" class="form-control" name="nomor" id="nomor" value="<?= $row['nomor']; ?>" />
				</div>
				<div class="form-group">
					<label for="quest">Pertanyaan Keamanan</label>
					<select class="form-control selectpicker" name="question">
                    <option selected="selected" value="<?= $row['question']; ?>"><?= $row['question']; ?></option>
					<option value="Siapakah Nama Ibu Anda ?">Siapa Kah Nama Ibu anda ?</option>
					<option value="Siapakah Nama Teman Terbaik Anda ?">Siapakah Nama Teman Terbaik Anda ?</option>
					<option value="Siapakah Nama Guru Terbaik Anda ?">Siapakah Nama Guru Terbaik Anda ?</option>
					</select>
				</div>
				<div class="form-group">
					<label for="answer">Jawaban</label>
					<input type="text" class="form-control" id="answer" name="answer" value="<?= $row['answer']; ?>" />
				</div>
				<div class="form-group">
					<input type="submit" value="Update" name="update" class="btn btn-md btn-info" />
				</div>
        <?php } ?>
        </form> 
        
    </div>
</div>
<noscript>
<h1>Aktifkan Javascript!</h1>
</noscript>
</html>