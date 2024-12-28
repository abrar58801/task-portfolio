<?php
require "./class/config.php";

$res = [];

if (isset($_POST['city_id']) && !empty($_POST['city_id'])) {
    $city_id = filter($_POST['city_id']);
} else {
    $city_id = '';
}

if (isset($_POST['state_id']) && !empty($_POST['state_id'])) {
    $state_id = filter($_POST['state_id']);
} else {
    $state_id = '';
}

if (isset($_POST['address']) && !empty($_POST['address'])) {
    $address = filter($_POST['address']);
} else {
    $address = '';
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = filter($_POST['email']);
} else {
    $email = '';
}

if (isset($_POST['phone']) && !empty($_POST['phone'])) {
    $phone = filter($_POST['phone']);

    if (strlen($phone) !== 10) {
        $res['msg'] = 'Phone should be 10 characters';
        $res['status'] = 101;
    } elseif (!in_array(substr($phone, 0, 1), ['6', '7', '8', '9'])) {
        $res['msg'] = 'Phone should start with 6, 7, 8, or 9';
        $res['status'] = 101;
    }
} else {
    $res['msg'] = 'Phone No is required';
    $res['status'] = 101;
}


if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = filter($_POST['name']);
} else {
    $res['msg'] = 'Name is required';
    $res['status'] = 101;
}

if (isset($_POST['hidden_id']) && !empty($_POST['hidden_id'])) {
    $id = filter($_POST['hidden_id']);
} 

if (!$res) {

    if (isset($id) && intval($id)) {
        $update_query = "UPDATE tbl_user SET name='$name',  
                                                phone='$phone', 
                                                email='$email', 
                                                address='$address', 
                                                state_id='$state_id', 
                                                city_id='$city_id' WHERE id = '$id'";

        $update = runUpdate($update_query);
        if ($update) {

            $res['status'] = 102;
            $res['msg'] = 'Successfully Updated';
        } else {
            $res['status'] = 101;
            $res['msg'] = 'An Error Occured';
        }
    } else {

        $insert_query = "INSERT INTO tbl_user (name, phone, email, address, state_id, city_id) value ( '$name', '$phone', '$email', '$address', '$state_id', '$city_id')";
        $insert = runInsert($insert_query);

        if ($insert) {

            $res['status'] = 100;
            $res['msg'] = 'Inserted Successfull';
        } else {
            $res['status'] = 101;
            $res['msg'] = 'An Error Occured';
        }
    }
}

echo json_encode($res);
