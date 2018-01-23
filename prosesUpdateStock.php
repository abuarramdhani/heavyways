	<?php
	require("Koneksi.php");
	require("Session_Cek.php");

	$mNamaAlat = $_POST["NamaAlat"];
	$mID = $_POST["ID"];
	$mModel = $_POST["Model"];
	$mJumlah = $_POST["Jumlah"];
	$mTarif = $_POST["Tarif"];
	$mIDlama = $_POST["idasal"];

	$query_update = "UPDATE alat_db SET nama_alat='".$mNamaAlat."' , model='".$mModel."', jumlah='".$mJumlah."' , tarif='".$mTarif."' , id='".$mID."'  WHERE id='".$mIDlama."'";

	if(mysqli_query($koneksi, $query_update)){
		setcookie('sukses', 1);
		header('Location: service.php');
	}
	else{
		setcookie('gagal', 1);
		header('Location: updateStock.php'); 
	}
?>
