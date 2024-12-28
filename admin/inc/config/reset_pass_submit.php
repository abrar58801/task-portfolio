<?php
require "./class/config.php";

$res = [];


if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password = md5($_POST['password']);
} else {
    $res['msg'] = 'Password is required';
    $res['status'] = 101;
}

if (isset($_POST['token']) && !empty($_POST['token'])) {
    $token = filter($_POST['token']);
} else {
    $res['msg'] = 'Token is required';
    $res['status'] = 101;
}

if (!$res) {

    $check_user = runFatch("SELECT user_id FROM tbl_password_reset WHERE token = '{$token}' ");
    $user_id = @$check_user[0]['user_id'];

    if ($check_user > 0) {
        $update_query = "UPDATE tbl_admin SET password='$password' WHERE id = '$user_id'";

        $update = runUpdate($update_query);

        if ($update) {

            runDelete("DELETE FROM tbl_password_reset WHERE user_id = '$user_id'");
            
            $res['status'] = 100;
            $res['msg'] = 'Password Reset Successfully';
        } else {
            $res['status'] = 101;
            $res['msg'] = 'An Error Occured';
        }
    } else {
        $res['status'] = 101;
        $res['msg'] = 'User does not exists !';
    }
}

echo json_encode($res);
