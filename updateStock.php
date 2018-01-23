<?php
  include("Session_Cek.php");
  include("Koneksi.php");
  $mID = $_GET['id'];
    $q = "SELECT * FROM alat_db WHERE id='".$mID."'";
    $dbq = mysqli_query($koneksi, $q);
    $row = mysqli_fetch_array($dbq);

include("layout.php");
?>
<head>
 	<title>Update Alat</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css" />
 </head>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script><div class="container up">
 <script src="js/sweetalert.min.js"></script>
  <div class="row">
    <div class="page-header">
      <h1>Update Alat</h1>
    </div>
    <div class="col-lg-6">
<form method="post" action="prosesUpdateStock.php">
              <div class="form-group">
								<label for="NamaAlat">Nama Alat</label>
                <input type="text" class="form-control" id="NamaAlat" name="NamaAlat" value="<?php echo $row['nama_alat']; ?>"/>
              </div>
              <div class="form-group">
                <label for="ID">ID Barang</label>
                <input type="text" class="form-control" id="ID" name="ID" value="<?php echo $row['id']; ?>" />
              </div>
              <div class="form-group">
                <label for="Model">Model</label>
                <input type="text" class="form-control" id="Model" name="Model" value="<?php echo $row['model']; ?>" />
              </div>
              <div class="form-group">
                <label for="Jumlah">Jumlah</label>
                <input type="text" class="form-control" id="Jumlah" name="Jumlah" value="<?php echo $row['jumlah']; ?>" />
              </div>
              <div class="form-group">
                <label for="Tarif">Tarif Per Hari</label>
                <input type="text" class="form-control" id="Tarif" name="Tarif" value="<?php echo $row['tarif']; ?>" />
              </div>
              <div class="form-group">
                <input type="hidden" id="idasal" name="idasal" value="<?php echo $mID; ?>" />
                <input type="submit" class="btn btn-md btn-primary" value="Update" />
              </div>
</form>
<?php
if(isset($_COOKIE['gagal'])){
  setcookie('gagal', '');
  ?>
  <script>
    swal('Gagal', 'Update Data Gagal', 'error');
  </script>
  <?php

}
?>
</div>
</div>
</div>
