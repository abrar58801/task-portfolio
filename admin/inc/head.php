<?php
require "./inc/config/class/config.php";

if (!isset($_SESSION['admin_id'])) {
	header("Location: ./login.php");
}

$select_website_setting = runFatch("SELECT * FROM tbl_website_setting");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title><?= @$select_website_setting[0]['website_title'] ?> - Admin</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../upload/<?= @$select_website_setting[0]['favicon'] ?>">

	<!-- Fontfamily -->
	<link rel="stylesheet" href="./assets/css/onlinecss/googlefont.css" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="./assets/plugins/feather/feather.css">

	<!-- Pe7 CSS -->
	<link rel="stylesheet" href="./assets/plugins/icons/flags/flags.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="./assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="./assets/plugins/fontawesome/css/all.min.css">

	<!-- Datatables css -->
	<link rel="stylesheet" href="./assets/css/onlinecss/datatable.css" />

	<!-- select 2 liabrery  -->
	<link rel="stylesheet" href="./assets/css/onlinecss/select2.css" />


	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="./assets/css/style.css">
</head>