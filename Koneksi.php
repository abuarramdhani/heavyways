<?php
	$usr = "root";
	$pas = "";
	$lokasi_db = "localhost";
	$nama_db = "heavyways";
	//$nama_db merupakan nama database dimana data akan dimasukkan

	$koneksi = mysqli_connect($lokasi_db, $usr, $pas, $nama_db, 3306);
	//Digunakan untuk membuat hubungan antara php ke database MySQL
	mysqli_select_db($koneksi, $nama_db);
	//Digunakan untuk memilih database yang akan digunakan
?>
