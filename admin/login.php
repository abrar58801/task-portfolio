<?php
require "./inc/config/class/config.php";

if (isset($_SESSION['admin_id'])) {
	header("Location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Abrar - Login</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/img/favicon.png">

	<!-- Fontfamily -->
	<link rel="stylesheet" href="./assets/css/onlinecss/googlefont.css" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/plugins/feather/feather.css">

	<!-- Pe7 CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left">
						<img class="img-fluid h-100 rounded" src="assets/img/login.jpg" alt="Logo">
					</div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1 class="mb-3">Welcome to Abrar</h1>
							<h2>Sign in</h2>
							<!-- Form -->
							<form id="admin_login">
								<div class="form-group">
									<label>Username <span class="login-danger">*</span></label>
									<input name="username" class="form-control" type="text">
									<span class="profile-views"><i class="fas fa-user-circle"></i></span>
								</div>
								<div class="form-group">
									<label>Password <span class="login-danger">*</span></label>
									<input name="password" class="form-control pass-input" type="password">
									<span class="profile-views feather-eye toggle-password"></span>
								</div>

								<div class="forgotpass">
									<a href="./forgot-password.php" class="ms-0">Forgot Password?</a>
								</div>
								
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit">Login</button>
								</div>
							</form>
							<!-- /Form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- sweet alert -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
	<script src="./assets/js/onlinejs/jquery.min.js"></script>

	<!-- sweet alert -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
	<script src="./assets/js/onlinejs/sweetalert.js"></script>

	<!-- jQuery -->
	<script src="assets/js/jquery-3.7.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<!-- Feather Icon JS -->
	<script src="assets/js/feather.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	<script src="assets/js/helper.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>