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
<style>
    .loader-container {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        /* semi-transparent background */
        text-align: center;
    }

    .loader {
        border: 4px solid #f3f3f3;
        /* Light grey */
        border-top: 4px solid #3498db;
        /* Blue */
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
        margin: auto;
        margin-top: 20%;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<body>
    <div class="loader-container">
        <div class="loader"></div>
    </div>

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
                            <h2>Forgot Password</h2>
                            <!-- Form -->
                            <form id="forgot_pass_submit">
                                <div class="form-group">
                                    <label>Enter your registered email address <span class="login-danger">*</span></label>
                                    <input name="email" class="form-control" type="email">
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
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