<?php
require __DIR__."/config.php";

$res = [];

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['password']) && filter($_POST['password'])) {
    $password = md5(filter($_POST['password']));
} else {
    $res['status'] = 101;
    $res['msg'] = 'Password is required';
}

if (isset($_POST['username']) && filter($_POST['username'])) {
    $username = filter($_POST['username']);

    if (!checkValidEmail($username)) {
        $res['status'] = 101;
        $res['msg'] = 'Invalid Email';
    }
} else {
    $res['status'] = 101;
    $res['msg'] = 'Email is required';
}

if (!$res) {

    // Perform SQL query to check if the provided username and password are valid
    $query = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' AND status = 1 ";
    $result = runFatch($query);

    if (count($result) == 1) {
        $_SESSION['admin_id'] = $result[0]['id'];
        $_SESSION['admin_name'] = $result[0]['name'];
        $_SESSION['admin_type'] = $result[0]['admin_type'];
        $_SESSION["role"] = $result[0]["role"];

        if($result[0]['role'] == 0){
            session_unset();
            session_destroy();
            $res["status"] = 101;
            $res["msg"] = "Permission denied.";
        }else{
            $res["status"] = 100;
            $res["msg"] = "Login Successful";
        }
    } else {
        $res['status'] = 101;
        $res['msg'] = 'Login Failed';
    }
}

echo json_encode($res);
