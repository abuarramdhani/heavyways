<?php
    include("Koneksi.php");
    include('Session_Cek.php');
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$user = $_POST['user'];
	$question = $_POST['question'];	
	$answer = $_POST['answer'];
	$nomor = $_POST['nomor'];
	$email = $_POST['email'];
    $q = "UPDATE daftar SET (nama_perusahaan, alamat, user, question, answer, nomor, email) VALUES ('".$nama."','".$alamat."','".$user."','".$question."','".$answer."','".$nomor."','".$email."') WHERE user='".$user."'";
    $run = mysqli_query($koneksi, $q) or die("error Mysql".mysql_error($koneksi));
    if($run){
    setcookie('success', 1);
    header("Location: Perusahaanlist.php");
    }

?>