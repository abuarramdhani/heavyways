<?php
session_start();
include("Koneksi.php");
$answer = $_POST['jawaban'];
$user = $_SESSION['nama'];

$q = "SELECT * FROM daftar WHERE user='$user' AND answer='$answer'";
$run = mysqli_query($koneksi, $q);
$hasil = mysqli_fetch_array($run);
if($hasil['answer'] == $answer){
    header("Location: changepass.php");
}
else {
    header("Location: login.php");
}


?>
