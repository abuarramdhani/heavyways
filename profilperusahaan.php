<?php


session_start();
$user = $_GET['user'];
include("Koneksi.php");

$q = "SELECT * from daftar where user='$user'";
$queried = mysqli_query($koneksi, $q);
$result = mysqli_fetch_array($queried);

include("layout.php");
?>

<head>
  <link rel="stylesheet" href="bootstrap.min.css" />
</head>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
<div class="container up">
  <div class="row">
    <div class="page-header">
      <h1><?php echo $result['nama_perusahaan']; ?></h1>
    </div>
    <div class="col-lg-6">
      <div class="thumbnail">
        <img src="<?php echo $result['photo']; ?>" />
      </div>
    </div>
    <div class="col-lg-6">
      <table class="table table-bordered">
        <tr>
          <td width="2  00px">Nama Perusahaan</td>
          <td><?php echo $result['nama_perusahaan']; ?></td>
        </tr>
        <tr>
          <td width="2  00px">Alamat Perusahaan</td>
          <td><?php echo $result['alamat']; ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
