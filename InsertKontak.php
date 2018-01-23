<?php
	include("Koneksi.php");
	$mName = $_POST['Nama'];
	$mEmail = $_POST['Email'];
	$mSubject = $_POST['Subject'];
	$mMessage = $_POST['Message'];
	$query_insert = "INSERT INTO kontak VALUES ('".$mName."','".$mEmail."','".$mSubject."','".$mMessage."')";
	//Query diatas digunakan untuk memasukkan data ke dalam database
	//('','','','','') <- Merupakan data yang ingin dimasukkan ke dalam database
	//jika di dalam database terdapat lebih dari 5 kolom maka bisa dimasukkan lagi kutip baru contoh ('')
	//isi dari '' bisa di isi dengan huruf langsung atau dengan '.$GET_[namaVariable].'

	if(mysqli_query($koneksi, $query_insert)){
		header('Location: Menu.php');
	}else{
		header('Location: Menu.php');
	}
	//Fungsi yang digunakan untuk melaksanakan query untuk memasukkan data
?>
