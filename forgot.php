<?php

include("layout.php");

?>
<html>
<head>
	<title>Lupa Password</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<style>

	.margined {
		margin-top: 150px;
	}
	</style>
</head>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container">
<div class="row margined">
	<div class="col-lg-5">
		<h1>Reset Password</h1>
		<br><br>
		<form action="forgetproc.php" method="POST">
			<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control" />
			<br>
			<input type="submit" name="submit" value="Submit" class="btn btn-success btn-md" />	
			</div>
		</form>
	</div>
	<div class="col-lg-5">
	
</div>
</div>
</html>