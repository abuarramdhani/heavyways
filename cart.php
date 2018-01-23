<?php
include("Koneksi.php");
$id = $_GET['id'];
$q = "SELECT * FROM alat_db WHERE id='$id'";
$res = mysqli_query($koneksi, $q);

$data = mysqli_fetch_array($res);
include("layout.php");
?>
<title>Proses Pesanan</title>
<div class="container up">
  <div class="pageheader">
    <h1><span class="glyphicon glyphicon-shopping-cart"> </span> Proceed To Cart</h1>
  </div>
  <div class="row">
  </div>
</div>
