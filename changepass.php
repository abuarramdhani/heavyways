<?php
session_start();
if(!isset($_SESSION['nama'])){
    header("Location: index.php");
    setcookie('belumlogin', 1);
}
 include('layout.php');
 $sukses = $_COOKIE['sukses'];
 $gagal = $_COOKIE['gagal'];

?>

 <head>
 	<title>Ganti Password</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css" />
 </head>
 <script src="js/sweetalert.min.js"></script>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <div class="container up">
 <div class="page-header">
 <h1>Change Password</h1>
 </div>
 <div class="row">
 <div class="col-lg-6">
 <form name="changepass" method="POST" action="changepass.php">
 <div class="form-group">
    <label for="newpass1">Password Baru</label><br>
    <input type="password" id="newpass1" name="newpass1" class="form-control" />
</div>
<div class="form-group">
    <label for="newpass2">Konfirmasi Password Baru</label><br>
    <input type="password" id="newpass1" name="newpass2" class="form-control" />
    <br>
</div>
<div class="form-group">
 <input type="submit" class="btn btn-md btn-success" name="change" value="Change Password !" />
 </div>
 </form>
 </div>
 </div>
 </div>
 <?php
if(isset($_POST['change'])){
    $user = $_SESSION['nama'];
    $pass1 = $_POST['newpass1'];
    $pass2 = $_POST['newpass2'];
    if($pass1 == $pass2){
        $pass1 = sha1($pass1);
        include("Koneksi.php");
        setcookie("success", 1);
        $q = "UPDATE daftar SET password='$pass1' WHERE user='$user'";
        $run = mysqli_query($koneksi, $q) or die("Connection Error");
        echo "<script>swal('Sukses', 'Ganti Password Sukses', 'success')</script>";
    }
    else {
        setcookie("gagal", 1);
        echo "<script>swal('Gagal')</script>";
    }
}

 ?>
