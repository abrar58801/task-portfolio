<?php
require_once('./class/config.php');
$response = [];
if(isset($_POST['courseID']) && filter($_POST['courseID'])){
    $courseID = filter($_POST['courseID']);
    $response = runFatch("SELECT id,title FROM tbl_year WHERE course_id = '{$courseID}'");
}

echo json_encode($response);
?>