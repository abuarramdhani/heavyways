<?php

	include("Koneksi.php");
	$mNama = $_POST["nama"];
	$mAlamat = $_POST["alamat"];
	$mUser = $_POST["user"];
	$mNomor = $_POST['nomor'];
	$mEmail = $_POST['email'];
	$mPassword = sha1($_POST["password"]);
	$mPertanyaan = $_POST['question'];
	$mAnswer = $_POST['answer'];
	$Mphoto = $_FILES['file']['name'];
	$path = "uploads/profil".$mUser.$Mphoto;
if(!isset($Mphoto)){
	echo "Tidak Bisa Upload Photo atau Photo Belum Di Tambahkan";
}

else {
	move_uploaded_file($_FILES['file']['tmp_name'], $path);
}

	if($mNama == "" || $mAlamat == "" || $mUser == "" || $mPassword == "" ){
		header('Location: Daftar.php');
		setcookie('kosong', 1);
	}

	//Fungsi diatas digunakan untuk mencegah form kosong

	else{

	$mMatchq = "SELECT * FROM daftar where user='".$mUser."'";
	$mMatchrun = mysqli_query($koneksi, $mMatchq);

	if(mysqli_num_rows($mMatchrun) != 0){
		header('Location: Daftar.php');
		setcookie('ada', 1);
	}
	else {
	$query_insert = "INSERT INTO daftar (nama_perusahaan, email, nomor, alamat, user, password, grant_user, photo, question, answer) VALUES ('".$mNama."','".$mEmail."','".$mNomor."','".$mAlamat."','".$mUser."','".$mPassword."','vendor','".$path."','".$mPertanyaan."','".$mAnswer."')";
	//Query diatas digunakan untuk memasukkan data ke dalam database
	//('','','','','') <- Merupakan data yang ingin dimasukkan ke dalam database
	//jika di dalam database terdapat lebih dari 5 kolom maka bisa dimasukkan lagi kutip baru contoh ('')
	//isi dari '' bisa di isi dengan huruf langsung atau dengan '.$GET_[namaVariable].

	if(mysqli_query($koneksi, $query_insert)){
		setcookie('successdaftar', 1);
		header('Location: Perusahaanlist.php');
	}
	else{
		echo "Upsss Ada Masalah :)";
	}
	}
	}
	//Fungsi yang digunakan untuk melaksanakan query untuk memasukkan data
?>
