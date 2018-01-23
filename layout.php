<!DOCTYPE html>
<meta charset="utf-8" />
<style>

.dropdown-menu {
  background-color: #5ccfb0;
  color: white;
}
.up {
  margin-top: 100px;
}
.upbot {
  padding: 20px 0 20px 0;
}
.colored {
  background-color: #5ccfb0;
  color: white;
}
.reverse {
  background-color: #333;
  color: white;
}
</style>
 <head>
   <link rel="stylesheet" href="css/bootstrap.min.css">

 </head>
   <script scr="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
<div class="container-fluid">
  <nav class="navbar navbar-inverse navbar-fixed-top upbot">
    <div class="navbar-header" style="margin-left: 30px;">
      <a class="navbar-brand" href="index.php">Heavy Ways</a>
    </div>
    <div class="collapse navbar-collapse" style="margin-right: 40px;">
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

</div>
