<?php
error_reporting(0);
session_start();
setcookie('kosong', '');
setcookie('gagal', '');
setcookie('belumlogin', '');
setcookie("successdaftar", '');
include('Koneksi.php');
$qcek = "SELECT * FROM cart WHERE notified='1' AND pemilik='".$user."'";
$runcek = mysqli_query($koneksi, $qcek);
$rescek = mysqli_num_rows($runcek);

if(isset($rescek)){
	?>
	<script>
	swal('Notification','Anda Memiliki <?= $rescek ?> Order');
	</script>
	<?php
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<!--
    	Boxer Template
    	http://www.templatemo.com/tm-446-boxer
    	-->
		<meta charset="utf-8">
		<title>Heavyways - Your Ways for Heavy Equipment</title>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">

		<!-- animate css -->
		<link rel="stylesheet" href="css/animate.min.css">
		<!-- bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- font-awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- google font -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800' rel='stylesheet' type='text/css'>

		<!-- custom css -->
		<link rel="stylesheet" href="css/templatemo-style.css">

	</head>
	<body>
	    <script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	   <!-- <script src="js/wow.min.js"></script> -->
	   	<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
		<script src="js/jquery.singlePageNav.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/sweetalert.min.js"></script>
		<script>
				function form_login_submit() {
					document.getElementById("login_form").submit();
				}
				function form_register_submit() {
					document.getElementById("register_form").submit();
				}
		</script>
		<?php
        if(isset($_COOKIE['gagal'])){
				?>
				<script>swal('Gagal', "Username Atau Password Salah", 'error');</script>
                <?php
        }
            if(isset($_COOKIE['belumlogin'])){
                echo "Anda Harus Login Terlebih Dahulu untuk Mengakses Halaman Tersebut<br><br>";

		?>
			<script>swal("Access Ditolak", "Anda Harus Login Dulu", 'error');</script>
		<?php
            }
			if($_COOKIE['successdaftar'] >= 1){
		?>
		<script>swal("Selamat", "Anda Telah Terdaftar", 'success');</script>
		<?php
	}
			if($_COOKIE['kosong'] >= 1){
		?>
		<script>swal("Gagal", "Jangan Mengosongkan Salah Satu Form", 'error');</script>
		<?php
	}
	if(isset($_SESSION['user_level'])){
		/*header("Location: index.php");*/
	}
	?>
		<!-- start preloader -->
		<div class="preloader">
			<div class="sk-spinner sk-spinner-rotating-plane"></div>
    	 </div>
		<!-- end preloader -->
		<!-- start navigation -->
		<nav class="navbar navbar-default navbar-fixed-top templatemo-nav" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Heavyways</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right <text-up></text-up>percase">
						<li><a href="#home">HOME</a></li>
						<?php
						if(!isset($_SESSION['user_level']) || $_SESSION['user_level'] == 'user') { ?>
						<li><a href="#feature">FITUR</a></li>
						<li><a href="#download">UNDUH</a></li>
						<li><a href="#contact">KONTAK</a></li>
						<li><a href="Product.php">DAFTAR ALAT</a></li>

						<?php }  ?>
		<?php
			 $users = $_COOKIE['owner'];
		 	if($_SESSION['user_level'] == "vendor"){
				 echo "<li class=\"dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" >SERVICES<span class=\"caret\"></span></a>
				 <ul class=\"dropdown-menu\">
				 <li><a href=\"service.php\">MANAGE ALAT</a></li>
				 <li><a href=\"AddStock.php\">TAMBAH ALAT</a></li>
				 </ul>"
				 ;
				if($rescek >= 1){
					 echo "<li class=\"dropdown\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" href=\"#\" >ORDERS<span class=\"caret\"></span><span class=\"badge badge-warning\">$rescek</span></a>
				 	<ul class=\"dropdown-menu\">
				 	<li><a href=\"orderlist.php\">MANAGE ORDERS</a></li>
				 	</ul>
			 		<script>
			 		swal('Pemberitahuan', 'Anda Punya Order Baru');
			 		<script>";
				}
			else {
				echo "<li class=\"dropdown\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" href=\"#\" >ORDERS<span class=\"caret\"></span></a>
			 	<ul class=\"dropdown-menu\">
				<li><a href=\"orderlist.php\">MANAGE ORDERS</a></li>
			 	</ul>";
				}
		 	}
			if($_SESSION['user_level'] == "Admin"){
				echo "<li class=\"dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" >PEGAWAI<span class=\"caret\"></span></a>
				<ul class=\"dropdown-menu\">
				<li><a href=\"DaftarPegawai.php\">MANAGE KARYAWAN</a></li>
				<li><a href=\"TambahkanPegawai.php\">TAMBAH KARYAWAN</a></li>
				</ul>
				</li>
				<li><a href=\"jadwal.php\">TRANSAKSI</a></li>";
				echo "<li class=\"dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">PERUSAHAAN<span class=\"caret\"></span></a>
				<ul class=\"dropdown-menu\">
				<li><a href=\"Perusahaanlist.php\">MANAGE PERUSAHAAN</a></li>
				<li><a href=\"DaftarPerusahaan.php\">TAMBAH PERUSAHAAN</a></li>
				</ul>
				</li>";
			 	echo "<li><a href=\"logout.php\" >LOG OUT</a></li>";
		 	}

		 	else if(isset($_SESSION['user_level'])){
		/*		echo "<li><a href=\"Perusahaanlist.php\">Company List</a></li>";*/
				if($_SESSION['user_level'] == "user"){
					echo "<li><a href=\"OrderSaya.php\" >ORDER SAYA</a></li>";
				}
				echo "<li><a href=\"logout.php\" >LOG OUT</a></li>";
		 	}
		 	else {
			 /*echo "<li><a href=\"Perusahaanlist.php\">COMPANY LIST</a></li>";*/
			 echo "<li><a href=\"#login\" data-toggle=\"modal\" data-target=\"#loginmodal\" >LOG IN</a></li>";
			 echo "<li><a href=\"#register\" data-toggle=\"modal\" data-target=\"#registermodal\" >REGISTER</a></li>";
		 	}

		?>
					</ul>
				</div>
			</div>
		</nav>
		<div class="modal fade" id="loginmodal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Log In</h2>
					</div>
					<div class="modal-body">
							<form method="POST" id="login_form" name="login" action="login.php">
								<label for="user">Username</label>
								<input class="form-control" type="text" name="Username" id="user" />
								<label for="pass">Password</label>
								<input class="form-control" type="password" name="Password" id="pass" />
								<br>
								<div class="form-group">
								<a href="forgot.php" style="text-decoration: none">Forgot Passsword ?</a>
								<br>
								</div>
								<div class="form-group">
									<input type="submit" onclick="form_login_submit()" class="btn btn-info btn-md" name="Login" value="Log In" />
								</div>
							</form>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="registermodal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Register</h2>
					</div>
					<div class="modal-body">
						<!-- <form method="POST" id="register_form" action="register.php">
							<label for="nama">Nama Lengkap</label>
							<input type="text" class="form-control" name="nama" id="nama" />
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control" name="alamat" id="alamat" />
							<label for="email">Email</label>
							<input type="text" class="form-control" name="email" id="email" />
							<label for="nomor">Nomor Telepon</label>
							<input type="text" class="form-control" name="nomor" id="nomor" />
							<label for="quest">Pertanyaan Keamanan</label>
					            <select class="form-control selectpicker" name="question">
					                <option value="Siapakah Nama Ibu Anda ?">Siapa Kah Nama Ibu anda ?</option>
					                <option value="Siapakah Nama Teman Terbaik Anda ?">Siapakah Nama Teman Terbaik Anda ?</option>
					<option value="Siapakah Nama Guru Terbaik Anda ?">Siapakah Nama Guru Terbaik Anda ?</option>
					</select>
							<label for="username">Username</label>
							<input type="text" class="form-control" name="username" id="username" />
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" id="password" />
							<br>
							<div class="form-group">
								<input type="submit" onclick="form_register_submit()" class="btn btn-info btn-md" name="register" value="Register" />
							</div>
						</form> -->
				<form action="register.php" id="register_form" method="post">
				<div class="form-group">
					<label for="nama">Nama Anda</label>
					<input type="text" class="form-control" id="nama" name="Nama" />
				</div>
				<div class="form-group">
					<label for="alamat">Alamat Anda</label>
					<input type="text" class="form-control" id="alamat" name="Alamat" />
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="Username" />
				</div>
				<div class="form-group">
					<label for="pass">Password</label>
					<input type="password" class="form-control" id="pass" name="Password" />
				</div>
				<div class="form-group">
				    <label for="email">Email</label>
					<input type="text" class="form-control" name="email" id="email" />
					<label for="nomor">Nomor Telepon</label>
					<input type="text" class="form-control" name="nomor" id="nomor" />
				</div>
				<div class="form-group">
					<label for="quest">Pertanyaan Keamanan</label>
					<select class="form-control selectpicker" name="question">
					<option value="Siapakah Nama Ibu Anda ?">Siapa Kah Nama Ibu anda ?</option>
					<option value="Siapakah Nama Teman Terbaik Anda ?">Siapakah Nama Teman Terbaik Anda ?</option>
					<option value="Siapakah Nama Guru Terbaik Anda ?">Siapakah Nama Guru Terbaik Anda ?</option>
					</select>
				</div>
				<div class="form-group">
					<label for="answer">Jawaban</label>
					<input type="text" class="form-control" id="answer" name="answer" />
				</div>
				<div class="form-group">
					<input type="submit" value="Register!" name="register" class="btn btn-md btn-info" />
				</div>
			</form>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>

		<!-- end navigation -->
		<!-- start home -->
		<section id="home">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10 wow fadeIn" data-wow-delay="0.3s">
							<h1 class="text-upper">Heavyways</h1>
							<p class="tm-white"> Heavyways adalah aplikasi berbasis website dan mobile yang membantu anda dalam memanajemen dan rental alat berat</p>
							<img src="images/software-img1.png" class="img-responsive" alt="home img">
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
			</div>
		</section>
		<!-- end home -->
		<!-- start divider -->
		<section id="divider">
			<div class="container">
				<div class="row">
					<div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
						<i class="fa fa-laptop"></i>
						<h3 class="text-uppercase">Realtime Data Report</h3>
						<p>Memberikan laporan dari operator secara real - time untuk mengefektifkan  </p>
					</div>
					<div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
						<i class="fa fa-truck"></i>
						<h3 class="text-uppercase">Tracking Heavy Equipment</h3>
						<p>Memberikan informasi mengenai posisi alat yang sedang disewakan </p>
					</div>
					<div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
						<i class="fa fa-book"></i>
						<h3 class="text-uppercase">History Report for Company</h3>
						<p>Memberikan pelayanan riwayat yang dibutuhkan bagi perusahaan untuk bahan evaluasi </p>
					</div>
				</div>
			</div>
		</section>
		<!-- end divider -->

		<!-- start feature -->
		<section id="feature">
			<div class="container">
				<div class="row">
					<div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
						<h2 class="text-uppercase">Our Software Features</h2>
						<p>Manfaat menggunakan Heavyways: </p>
						<p><span><i class="fa fa-mobile"></i></span> Mendapatkan pelaporan secara Real - Time dari operator pada perusahaan bekerjasama</p>
						<p><span><i class="fa fa-check-circle-o"></span></i>Mendapatkan pelayanan untuk manajemen alat bagi para pelaku usaha penyewaan alat berat</p>
					</div>
					<div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
						<img src="images/software-img1.png" class="img-responsive" alt="feature img">
					</div>
				</div>
			</div>
		</section>
		<!-- end feature -->



		<!-- start download -->
		<section id="download">
			<div class="container">
				<div class="row">
					<div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
						<h2 class="text-uppercase">Download Our Software</h2>
						<p>Download Aplikasi Android Heavyways, Disini! </p>
						<button class="btn btn-primary text-uppercase"><i class="fa fa-download"></i> Download</button>
					</div>
					<div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
						<img src="images/software-img1.png" class="img-responsive" alt="feature img">
					</div>
				</div>
			</div>
		</section>
		<!-- end download -->

		<!-- start contact -->
		<section id="contact">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
							<h2 class="text-uppercase">Contact Us</h2>
							<p>Heavyways your ways for Heavy Equipment, we help your Heavy Equipment Company </p>
							<address>
								<p><i class="fa fa-map-marker"></i>Jalan Telekomunikasi No.1, Bandung, Indonesia</p>
								<p><i class="fa fa-phone"></i>081214994570</p>
								<p><i class="fa fa-envelope-o"></i> heavy.ways@yahoo.com</p>
							</address>
						</div>
						<div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
							<div class="contact-form">
								<form action="#" method="post">
									<div class="col-md-6">
										<input type="text" class="form-control" placeholder="Name">
									</div>
									<div class="col-md-6">
										<input type="email" class="form-control" placeholder="Email">
									</div>
									<div class="col-md-12">
										<input type="text" class="form-control" placeholder="Subject">
									</div>
									<div class="col-md-12">
										<textarea class="form-control" placeholder="Message" rows="4"></textarea>
									</div>
									<div class="col-md-8">
										<input type="submit" class="form-control text-uppercase" value="Send">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end contact -->

		<!-- start footer -->
		<footer>
			<div class="container">
				<div class="row">
					<p>Copyright © 2016 Heavyways</p>
				</div>
			</div>
		</footer>
		<!-- end footer -->
	</body>
</html>
