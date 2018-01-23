<?php
	include("Koneksi.php");
	include("Session_Cek.php");

	$mTarif = $_POST['Tarif'];
	$mOwner = $_COOKIE['owner'];
	$mNamaAlat = $_POST["NamaAlat"];
	$mID = $_POST["ID"];
	$mModel = $_POST["Model"];
	$mJumlah = $_POST["Jumlah"];
	$gambar = $_FILES['file']['name'];
	if($mNamaAlat == "" || $mID == "" || $mModel == "" || $mJumlah == "" || $gambar == "" || $mTarif == ""){
		header('Location: AddStock.php');
		setcookie('kosong', 1);
	}
	if(!isset($gambar)){
		echo "Tidak Dapat Mengupload Gambar";
	}
	else {
	$path = "uploads/".$mOwner."+".$mID.$gambar;
	$query_insert = "INSERT INTO alat_db (nama_alat, id, model, jumlah, photo, owner, tarif) VALUES ('".$mNamaAlat."','".$mID."','".$mModel."','".$mJumlah."', '".$path."', '".$mOwner."','".$mTarif."')";
	//Query diatas digunakan untuk memasukkan data ke dalam database
	//('','','','','') <- Merupakan data yang ingin dimasukkan ke dalam database
	//jika di dalam database terdapat lebih dari 5 kolom maka bisa dimasukkan lagi kutip baru contoh ('')
	//isi dari '' bisa di isi dengan huruf langsung atau dengan '.$GET_[namaVariable].'
	move_uploaded_file($_FILES['file']['tmp_name'], $path) or die("cant Upload Image");
	if(mysqli_query($koneksi, $query_insert)){
		header('Location: service.php');
	}else{
		header('Location: AddStock.php');
	}
	}
	//Fungsi yang digunakan untuk melaksanakan query untuk memasukkan data
?>
