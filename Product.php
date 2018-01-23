<?php
error_reporting(0);
include("Koneksi.php");
	session_start();
	$sql = "SELECT * FROM alat_db";
	$result = mysqli_query($koneksi, $sql);

	include("layout.php");
?>

<!DOCTYPE html>

<html>
<title>Product List</title>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
	<style>
	.tcenter {
		display: table-cell;
		vertical-align: middle;
		text-align: center;

	}
		.centered {
			text-align: center;
			vertical-align: middle;
		}

		.buttn {
			padding: 20px;
			background-color: rgb(74, 202, 168);
			color: white;
		}
		table {
			width: 100%;
		}
		.padded {
			padding: 20px 0 20px 0;
		}
		.pjg {
			height: 200px;
		}
		.table tbody > tr > td.rata {
    vertical-aligned: middle;

	}

		.marged {
			margin-bottom: 30px;
		}
	</style>
	<div class="container up">
		<div class="page-header">
			<h1 class="centered">Product List</h1>
		</div>
		<?php
		function jumlah($data){
			if($data == 0){
				return "Tidak Tersedia Saat Ini";
			}
			else {
				return "Tersedia";
			}
		}

		 ?>
		<?php while ($row = mysqli_fetch_array($result)) {

		?>
		<div class="row marged">
			<div class="col-lg-6">
				<div class="thumbnail">
					<img src="<?php echo $row['photo']; ?>" width="400px" height="150px"/>
				</div>
			</div>
			<div class="col-lg-6">
				<table class="table">
					<tr>
						<td width="150px"><h4>Nama Alat : </h4></td>
						<td><h4><?php echo $row['nama_alat']; ?></h4></td>
					</tr>
					<tr>
						<td width="150px"><h4>Pemilik : </h4></td>
						<td><h4><?php echo $row['owner']; ?></h4></td>
					</tr>
					<tr>
						<td width="150px"><h4>Model : </h4></td>
						<td><h4><?php echo $row['model']; ?></h4></td>
					</tr>
					<tr>
						<td width="150px"><h4>Status : </h4></td>
						<td><h4>
						<?php if(jumlah($row['jumlah'] >= 0)){
							echo "Alat Tersedia";
						}
						else {
							echo "Alat Tidak Tersedia";
						}
						?>
						</h4>
						</td>
					</tr>
					<tr>
						<td width="150px"><h4>Tarif : </h4></td>
						<td><h4>Rp. <?php echo number_format($row['tarif']); ?> /Jam</h4></td>
					</tr>
					<tr>
						<td><a href="lihatbarang.php?id=<?php echo $row['id']; ?>" <?php if($row['jumlah'] == 0){ echo "disabled"; } else { echo ""; } ?> class="btn btn-lg btn-primary">Cek Alat</a></td>
					</tr>
				</table>
			</div>
	</div>
	<?php } ?>
	<ul class="pagination pagination-lg">
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			</ul>
	</div>
