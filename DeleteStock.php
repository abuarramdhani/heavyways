<?php
	include("Koneksi.php");
	if(isset($_GET['id'])){
	$mID = $_GET["id"];
	$mGambar = "SELECT photo FROM alat_db WHERE id='".$mID."'";
	$query_insert = "DELETE FROM alat_db WHERE id='".$mID."'";

	//Query diatas digunakan untuk memasukkan data ke dalam database
	//('','','','','') <- Merupakan data yang ingin dimasukkan ke dalam database
	//jika di dalam database terdapat lebih dari 5 kolom maka bisa dimasukkan lagi kutip baru contoh ('')
	//isi dari '' bisa di isi dengan huruf langsung atau dengan '.$GET_[namaVariable].'

	if(mysqli_query($koneksi, $query_insert)){
		setcookie('suksesdelete', 1);
		header('Location: service.php');
	}
	else{
		echo "Error ke koneksi SQL";
		echo mysqli_query($koneksi, $query_insert);
		//header('Location: StockItem.php');
	}
	}
	else {
		echo "Error Input Control";
	}
	//Fungsi yang digunakan untuk melaksanakan query untuk memasukkan data
?>
