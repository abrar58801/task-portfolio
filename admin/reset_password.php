<?php
require "./inc/config/class/config.php";

if (isset($_SESSION['admin_id'])) {
    header("Location: ./index.php");
}

if(isset($_GET['token']) && !empty($_GET['token'])){
    $token = filter($_GET['token']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Abrar Ahmad - Forgot Password</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

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
                            <h1 class="mb-4">Welcome to Abrar Ahmad</h1>
                            <!-- <p class="account-subtitle">Need an account? <a href="./register.php">Sign Up</a></p> -->
                            <h2>Reset Password</h2>
                            <!-- Form -->
                            <form id="reset_pass_submit">
                                <input name="token" class="form-control" type="hidden" value="<?= $token ?>">
                                <div class="form-group">
                                    <label>Enter New Password <span class="login-danger">*</span></label>
                                    <input name="password" class="form-control" type="text">
                                    <span class="profile-views"></span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Reset My Password</button>
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
    <script src="./assets/js/onlinejs/jquery.min.js"></script>

    <!-- sweet alert -->
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