<?php
require_once('./class/config.php');
$response = [];
if(isset($_POST['state']) && filter($_POST['state'])){
    $state = filter($_POST['state']);
    $response = runFatch("SELECT * FROM tbl_cities WHERE state_id = '{$state}'");
}

echo json_encode($response);
?>