<?php
   
	include("Koneksi.php");
	$mNama = $_POST["Nama"];
	$mAlamat = $_POST["Alamat"];
	$mUser = $_POST["Username"];
	$mPassword = sha1($_POST["Password"]);
	$mQuestion = $_POST['question'];
	$mAnswer = $_POST['answer'];
	$email = $_POST['email'];
	$nomor = $_POST['nomor'];

	if($mNama == "" || $mAlamat == "" || $mUser == "" || $mPassword == "" ){
		header('Location: index.php');
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
	$query_insert = "INSERT INTO daftar (nama_perusahaan, alamat, user, password, grant_user, question, answer, nomor, email) VALUES ('".$mNama."','".$mAlamat."','".$mUser."','".$mPassword."','user','".$mQuestion."','".$mAnswer."','".$nomor."','".$email."')";
	//Query diatas digunakan untuk memasukkan data ke dalam database
	//('','','','','') <- Merupakan data yang ingin dimasukkan ke dalam database
	//jika di dalam database terdapat lebih dari 5 kolom maka bisa dimasukkan lagi kutip baru contoh ('')
	//isi dari '' bisa di isi dengan huruf langsung atau dengan '.$GET_[namaVariable].'

	if(mysqli_query($koneksi, $query_insert)){
		session_start();
		$_SESSION['user'] = $mUser;
		$_SESSION['user_level'] = 'user';
		header('Location: index.php');
		setcookie('successdaftar', 1);
	}
	else{
		echo "Upsss Ada Masalah :)".mysql_error();
	}
	}
	}
	//Fungsi yang digunakan untuk melaksanakan query untuk memasukkan data
?>
