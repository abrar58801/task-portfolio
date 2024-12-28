<?php
require '../admin/inc/config/class/config.php';

$res = [];

if (isset($_POST['message']) && !empty($_POST['message'])) {
    $message = filter($_POST['message']);
} else {
    $res['msg'] = 'Message is required';
    $res['status'] = 101;
}

if (isset($_POST['phone']) && !empty($_POST['phone'])) {
    $phone = filter($_POST['phone']);
} else {
    $res['msg'] = 'Phone Number is required';
    $res['status'] = 101;
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = filter($_POST['email']);
} else {
    $res['msg'] = 'Email is required';
    $res['status'] = 101;
}

if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = filter($_POST['name']);
} else {
    $res['msg'] = 'Name is required';
    $res['status'] = 101;
}


if (!$res) {
    $insert_query = "INSERT INTO tbl_contact (name,
                                              email,
                                              phone,
                                              message) VALUE ('$name',
                                                              '$email',
                                                              '$phone',
                                                              '$message')";

    $insert = runInsert($insert_query);
    if ($insert) {

        $res['status'] = 100;
        $res['msg'] = 'Successfully Insert';
    } else {
        $res['status'] = 101;
        $res['msg'] = 'An Error Occured';
    }
}

echo json_encode($res);
