<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "abrar_db";

// $servername = "localhost";
// $username = "u465618156_institute";
// $password = "Pk5*/Gzkw+M";
// $database = "u465618156_institute";

$dataTables = [
    'gallery' => 'tbl_gallery',
    'contact' => 'tbl_contact'
];

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
};
require __DIR__."/function.php";

?>