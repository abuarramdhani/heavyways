<?php
	include("Koneksi.php");
	//Digunakan untuk membuat hubungan antara php ke database MySQL
	//Digunakan untuk memilih database yang akan digunakan

	$mNamaPerusahaan = $_POST["NamaAlat"];
	$mID = $_POST["ID"];
	$mModel = $_POST["Model"];
	$mJumlah = $_POST["Jumlah"];

	$query_insert = "INSERT INTO service VALUES ('".$mNamaBarang."','".$mID."','".$mModel."','".$mModel."','".$mJumlah."')";
	//Query diatas digunakan untuk memasukkan data ke dalam database
	//('','','','','') <- Merupakan data yang ingin dimasukkan ke dalam database
	//jika di dalam database terdapat lebih dari 5 kolom maka bisa dimasukkan lagi kutip baru contoh ('')
	//isi dari '' bisa di isi dengan huruf langsung atau dengan '.$GET_[namaVariable].'

	if(mysqli_query($koneksi, $query_insert)){
		header('Location: service.php');
	}else{
		header('Location: service.php');
	}
	//Fungsi yang digunakan untuk melaksanakan query untuk memasukkan data
?>
