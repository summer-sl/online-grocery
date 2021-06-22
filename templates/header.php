<!DOCTYPE html>
<html>

<head>
	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<!-- Bootstrap JS Code -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	<!-- Open MYSQL Connection -->
	<?php
	require('connection.php');
	session_start();
	?>

	<!-- Custom CSS-->
	<link rel="stylesheet" href="style.css">
</head>

<header>
	<nav class="navbar navbar-expand-md navbar navbar-dark bg-dark my-3 ">
		<a class="navbar-brand font-title" href="index.php">
			<img src="./assets/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			Agogo Cart
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent1">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active font-function"> <a class="nav-link" href="index.php">HOME</a> </li>
				<li class="nav-item active font-function"> <a class="nav-link" href="order.php">ORDER</a> </li>
				<li class="nav-item active font-function"> <a class="nav-link" href="about_contact.php">CONTACT US</a> </li>
				<li class="nav-item active font-function "> <a class="nav-link" href="about_policy.php">POLICY</a> </li>
			</ul>

			<ul class="navbar-nav">
				<li class="nav-item active mr-sm-2 font-function"><a class="nav-link inactive" href="#">
						<?php
						if (isset($_SESSION["loggedin"])) {
							if ($_SESSION["loggedin"] == true) {
								$user_id = ($_SESSION['id']);
								$select_sql = "SELECT name FROM `users` WHERE id='$user_id'";

								$user_list = filterData("SELECT * FROM users WHERE id='$user_id'");
								foreach ($user_list as $user) {
									echo $user["username"];
								}
							} else {
								echo "Guest";
							}
						} else {
							echo "Guest";
						}
						?>
					</a></li>
				<li class="nav-item cart mr-sm-2 font-function">
					<a class="nav-link btn btn-fill-light font-function" href="cart.php">
						<span><i class="fa fa-shopping-cart"></i></span>
						<?php
						if (isset($_SESSION['loggedin'])) {
							if (isset($_SESSION['cart'])) {
								echo "  ".count($_SESSION['cart']);
							} else {
								echo "  0";
							}
						} else {
							echo "  0";
						}
						?>
					</a>
				</li>
				<!-- REVIEW - "if user logged in" CODE HERE -->
				<?php
				if (isset($_SESSION['loggedin'])) {
					if ($_SESSION['loggedin'] == true) { ?>
						<li class="nav-item mr-sm-2">
							<a class="nav-link btn btn-line-dark text-white font-function" href="account_logout.php"><span><i class="fa fa-sign-out-alt text-white"></i></span> Sign Out</a>
						</li>
						<li class="nav-item mr-sm-2">
							<a class="nav-link btn btn-line-dark text-white font-function" href="account_setting.php"><span><i class="fa fa-user text-white"></i></span> Setting</a>
						</li>
					<?php
					} else { ?>
						<li class="nav-item mr-sm-2">
							<a class="nav-link btn btn-line-dark text-white font-function" type="button" href="account_login.php"><span><i class="fa fa-sign-in text-white"></i></span> Sign In</a>
						</li>
						<li class="nav-item mr-sm-2">
							<a class="nav-link btn btn-line-dark text-white font-function" type="button" href="account_register.php"><span><i class="fa fa-sign-in text-white"></i></span> Register</a>
						</li>
					<?php
					}
				} else { ?>
					<li class="nav-item mr-sm-2">
						<a class="nav-link btn btn-line-dark font-function" href="account_login.php"><span><i class="fa fa-sign-in "></i></span>Sign In</a>
					</li>
					<li class="nav-item mr-sm-2">
						<a class="nav-link btn btn-line-dark text-white font-function" href="account_register.php"><span><i class="fa fa-sign-in text-white"></i></span>Register</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</nav>
</header>