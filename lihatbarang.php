<?php
error_reporting(0);
session_start();
include("Koneksi.php");
if(!isset($_GET['id'])){
  header("Location: index.php");
}
$mID = $_GET['id'];
$query = "SELECT * FROM alat_db where id='".$mID."'";
$result = mysqli_query($koneksi, $query);

$row = mysqli_fetch_array($result);
 include("layout.php");

?>

<style>
.middle {
  display: table-cell;
  text-align: center;
  vertical-align: middle;
}
.judul {
    width: 150px;
}
</style>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css1/jquery-ui.min.css" />
  <link rel="stylesheet" href="css/jquery.timepicker.min.css" />
</head>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function (){



$('.timepicker').timepicker({
    timeFormat: 'HH:mm',
    interval: 60,
    defaultTime: '11',
    startTime: '06:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

  $("#awal").datepicker(
    {
      dateFormat:"yy/mm/dd",
    }
  );
  $("#akhir").datepicker(
    {
      dateFormat:"yy/mm/dd",
   }
  );
});
</script>

<title>Proses Booking</title>
<div class="container up">
  <div class="page-header">
    <h2>Detail Alat</h2>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="thumbnail">
        <img src="<?php echo $row['photo']; ?>" width="600px" height="300px"/>
      </div>
    </div>
    <div class="col-lg-6">
      <table class="table table-bordered">
        <tr>
          <td class="judul"><h4>Nama Alat : </h4></td>
          <td><h4><?php echo $row['nama_alat']; ?></h4></td>
        </tr>
        <tr>
          <td><h4>Tarif Per Jam : </h4></td>
          <td><h4>Rp. <?php echo number_format($row['tarif']); ?></h4></td>
        </tr>
        <tr>
          <td><h4>Model Alat : </h4></td>
          <td><h4><?php echo $row['model']; ?></h4></td>
        </tr>
        <tr>
          <td><h4>Pemilik : </h4></td>
          <td><h4><?php echo $row['owner']; ?></h4></td>
        </tr>
        <tr>
          <td>
            <h4>Book Duration</h4>
          </td>
        </tr>
          <form method="POST" action="Order.php">
          <tr>
          <td>
            <h4>From :</h4>
          </td>
          <td>
            <input type="text" name="starttime" class="form-control" id="awal" placeholder="Click Untuk Membuka Kalender"></input>
            <input type="text" name="jamawal" class="form-control timepicker" id="jamawal" placeholder="Click Untuk Membuka Jam"></input>
          </td>
        </tr>
        <tr>
          <td>
            <h4>To :</h4>
          </td>
          <td>
            <input type="text" class="form-control" name="endtime" id="akhir" placeholder="Click Untuk Membuka Kalender" />
            <input type="text" name="jamakhir" class="form-control timepicker" id="jamakhir" placeholder="Click Untuk Membuka Jam"></input>
          </td>
        </tr>
        <tr>
        </tr>
        <tr>
          <td colspan="2">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>" /><input type="submit" name="submit" value="Tambahkan Ke Order" class="btn btn-md btn-primary" /></td>
        </tr>
      </form>
      </table>
    </div>
  </div>
</div>
