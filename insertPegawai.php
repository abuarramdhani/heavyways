<?php
	include("Koneksi.php");
	$mNamaDepan = $_POST["NamaDepan"];
	$mNamaBelakang = $_POST["NamaBelakang"];
	$mOrganization = $_POST["Organization"];
	$mJobPosition = $_POST["JobPosition"];
	$mJobTitle = $_POST["JobTitle"];
	$mCompanyWork = $_POST["CompanyWork"];
	$query_insert = "INSERT INTO pegawai VALUES ('".$mNamaDepan."','".$mNamaBelakang."','".$mOrganization."','".$mJobPosition."','".$mJobTitle."','".$mCompanyWork."')";
	//Query diatas digunakan untuk memasukkan data ke dalam database
	//('','','','','') <- Merupakan data yang ingin dimasukkan ke dalam database
	//jika di dalam database terdapat lebih dari 5 kolom maka bisa dimasukkan lagi kutip baru contoh ('')
	//isi dari '' bisa di isi dengan huruf langsung atau dengan '.$GET_[namaVariable].'

	if(mysqli_query($koneksi, $query_insert)){
		header('Location: TambahkanPegawai.php');
	}else{
		header('Location: TambahkanPegawai.php');
	}
	//Fungsi yang digunakan untuk melaksanakan query untuk memasukkan data
?>
