<?php
session_start();
include("Koneksi.php");
include("layout.php");
$username = $_POST['username'];
$q = "SELECT question,answer from daftar WHERE user='$username'";
$run = mysqli_query($koneksi,$q);
$hasil = mysqli_fetch_array($run);
if(!isset($hasil)){
    header("Location: login.php");
}
$_SESSION['nama'] = $username;

?>
<html>
<style>

	.margined {
		margin-top: 150px;
	}
	</style>
<div class="container">
    <div class="row margined">
    <div class="page-header">
        <h1>Pertanyaan Keamanan</h1>
    </div>
        <div class="col-lg-6">
            <form method="POST" action="forgetest.php">
                <h4><?php echo $hasil['question'].$hasiluser; ?></h4>
                <br>
                <input type="text" name="jawaban" class="form-control" />
                <br>
                <input type="submit" name="jawab" value="Jawab" class="btn btn-success btn-md" />

            </form>
        </div>
    </div>
</div>

</html>
