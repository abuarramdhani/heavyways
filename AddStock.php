<?php
error_reporting(0);
    include("Session_Cek.php");
	include("Koneksi.php");
	$sql = "SELECT * FROM alat_db";
	$result = mysqli_query($koneksi, $sql);
  $nilai;
  if(!($_SESSION['user_level'] == "Admin" || $_SESSION['user_level'] == "vendor")){
    header("Location: Homepage.php");
  }
  include('layout.php');
?>
<title>Tambah Alat</title>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container up">
  <div class="row">
    <div class="col-md-6">
      <div class="page-header">
        <h1>Tambah Alat Baru</h1>
      </div>
      <form method="post" action="insertAlat.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="namaalat">Nama Alat</label>
          <input class="form-control" type="text" id="namaalat" name="NamaAlat" />
        </div>
        <div class="form-group">
          <label for="tarif">Tarif</label>
          <input type="text" class="form-control" id="tarif" name="Tarif" />
        </div>
        <div class="form-group">
          <label for="id">ID</label>
          <input type="text" class="form-control" id="id" name="ID" />
        </div>
        <div class="form-group">
          <label for="jumlah">Jumlah</label>
          <input type="text" id="jumlah" class="form-control" name="Jumlah" />
        </div>
        <div class="form-group">
          <label for="model">Model</label>
          <input type="text" id="model" class="form-control" name="Model" />
        </div>
        <div class="form-group">
          <label for="files">Gambar</label>
          <input type="file" id="files" name="file" />
        </div>
        <div class="form-group">

          <input type="submit" id="submit" class="btn btn-md btn-success" value="Tambah!" />
        </div>
      </form>
    </div>
  </div>
</div>
