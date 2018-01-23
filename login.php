<?php
//SESSION START HARUS DILAKUKAN SEBELUM MENGGUNAKAN FUNGSI SESSION
session_start();
include('Koneksi.php');
	$user = $_POST['Username'];
	$pass = sha1($_POST['Password']);
	$query = "SELECT * FROM daftar WHERE user = '$user' AND password = '$pass'";
	$result = mysqli_query($koneksi, $query);

	if(mysqli_num_rows($result)!=0){
	$row = mysqli_fetch_array($result);
	  //$_SESSION BERARTI KITA MEMASUKKAN DATA KE DALAM SESSION YANG BERNAMA user_data DAN user_level
	  $_SESSION['user'] = $row['user'];
	  $_SESSION['user_level'] = $row['grant_user'];
		setcookie('owner', $user);
	  //KONDISI DIBAWAH DIGUNAKAN UNTUK MENGECEK SIAPA YANG LOG IN, JIKA LEBIH DARI 2 MAKA GUNAKAN ELSE IF
	  if ($_SESSION['user_level'] == 'Admin') {
		header('Location: index.php');
	  }else if($_SESSION['user_level'] == 'user'){
		  header('Location: index.php');
	  }else{
		  header('Location: index.php');
	  }
	}
	else {
	    setcookie('gagal', 1);
		header("Location: index.php");
	}
	?>
