<?php
require "./class/config.php";

$res = [];

if (isset($_FILES['hospital_cir2']) && !empty($_FILES['hospital_cir2']['name'])) {
    $filename = $_FILES['hospital_cir2']['name'];
    $tmpname_hospital_cir2 = $_FILES['hospital_cir2']['tmp_name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if ($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
        $hospital_cir2 = strtotime(date("Y-m-d-h:i")) . "_" . rand(100000, 9999999) . "." . $extension;
        $path_hospital_cir2 = "../../../upload/" . $hospital_cir2;
    } else {
        $res['status'] = 101;
        $res['msg'] = 'Select An Proper Hospital Cirtificate 2 Image !!';
    }
} elseif (isset($_POST['hidden_hospital_cir2']) && !empty($_POST['hidden_hospital_cir2'])) {
    $hospital_cir2 = filter($_POST['hidden_hospital_cir2']);
} else {
    $hospital_cir2 = "";
}

if (isset($_FILES['hospital_cir1']) && !empty($_FILES['hospital_cir1']['name'])) {
    $filename = $_FILES['hospital_cir1']['name'];
    $tmpname_hospital_cir1 = $_FILES['hospital_cir1']['tmp_name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if ($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
        $hospital_cir1 = strtotime(date("Y-m-d-h:i")) . "_" . rand(100000, 9999999) . "." . $extension;
        $path_hospital_cir1 = "../../../upload/" . $hospital_cir1;
    } else {
        $res['status'] = 101;
        $res['msg'] = 'Select An Proper Hospital Cirtificate 1 Image !!';
    }
} elseif (isset($_POST['hidden_hospital_cir1']) && !empty($_POST['hidden_hospital_cir1'])) {
    $hospital_cir1 = filter($_POST['hidden_hospital_cir1']);
} else {
    $hospital_cir1 = "";
}


if (isset($_POST['address']) && !empty($_POST['address'])) {
    $address = filter($_POST['address']);
} else {
    $res['msg'] = 'Address is required';
    $res['status'] = 101;
}

if (isset($_POST['city']) && !empty($_POST['city'])) {
    $city = filter($_POST['city']);
} else {
    $res['msg'] = 'City is required';
    $res['status'] = 101;
}

if (isset($_POST['state']) && !empty($_POST['state'])) {
    $state = filter($_POST['state']);
} else {
    $res['msg'] = 'State is required';
    $res['status'] = 101;
}


if (isset($_POST['hidden_id']) && empty($_POST['hidden_id'])) {
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = md5(filter($_POST['password']));
    } else {
        $res['msg'] = 'Password is required';
        $res['status'] = 101;
    }

    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $username = filter($_POST['username']);
    } else {
        $res['msg'] = 'Username is required';
        $res['status'] = 101;
    }
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
    $res['msg'] = 'Phone is required';
    $res['status'] = 101;
}

if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = filter($_POST['name']);
} else {
    $res['msg'] = 'Name is required';
    $res['status'] = 101;
}

if (isset($_FILES['profile']) && !empty($_FILES['profile']['name'])) {
    $filename = $_FILES['profile']['name'];
    $tmpname = $_FILES['profile']['tmp_name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if ($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
        $profile = strtotime(date("Y-m-d-h:i")) . "_" . rand(100000, 9999999) . "." . $extension;
        $path = "../../../upload/" . $profile;
    } else {
        $res['status'] = 101;
        $res['msg'] = 'Select An Proper Profile Image !!';
    }
} elseif (isset($_POST['hidden_profile']) && !empty($_POST['hidden_profile'])) {
    $profile = filter($_POST['hidden_profile']);
} else {
    $res['status'] = 101;
    $res['msg'] = "Profile Image is required";
}

if (isset($_POST['hidden_id']) && !empty($_POST['hidden_id'])) {
    $id = filter($_POST['hidden_id']);
}

if (!$res) {
    if (isset($id) && intval($id)) {
        $update_query = "UPDATE tbl_admin SET profile='$profile',   
                                                name='$name',  
                                                phone=$phone, 
                                                state=$state, 
                                                city='$city', 
                                                address='$address', 
                                                hospital_cir1='$hospital_cir1', 
                                                hospital_cir2='$hospital_cir2' WHERE id = '$id'";

        $update = runUpdate($update_query);
        if ($update) {
            if (isset($path) && !empty($path)) {
                move_uploaded_file($tmpname, $path);
            }
            if (isset($path_hospital_cir1) && !empty($path_hospital_cir1)) {
                move_uploaded_file($tmpname_hospital_cir1, $path_hospital_cir1);
            }
            if (isset($path_hospital_cir2) && !empty($path_hospital_cir2)) {
                move_uploaded_file($tmpname_hospital_cir2, $path_hospital_cir2);
            }
            
            $res['status'] = 102;
            $res['msg'] = 'Successfully Updated';
        } else {
            $res['status'] = 101;
            $res['msg'] = 'An Error Occured';
        }
    } else {
        $check_seller = runFatch("SELECT username FROM tbl_admin WHERE username = '{$username}' ");
        if ($check_seller) {
            $res['status'] = 101;
            $res['msg'] = 'Seller Already Exist';
        } else {
            $insert_query = "INSERT INTO tbl_admin (profile, 
                                                    name, 
                                                    phone, 
                                                    username, 
                                                    state, 
                                                    city, 
                                                    password, 
                                                    address,  
                                                    hospital_cir1, 
                                                    hospital_cir2) VALUE ('$profile', 
                                                                            '$name', 
                                                                             $phone, 
                                                                            '$username', 
                                                                             $state, 
                                                                            '$city', 
                                                                            '$password', 
                                                                            '$address', 
                                                                            '$hospital_cir1', 
                                                                            '$hospital_cir2')";

            $insert = runInsert($insert_query);
            if ($insert) {
                if (isset($path) && !empty($path)) {
                    move_uploaded_file($tmpname, $path);
                }
                if (isset($path_hospital_cir1) && !empty($path_hospital_cir1)) {
                    move_uploaded_file($tmpname_hospital_cir1, $path_hospital_cir1);
                }
                if (isset($path_hospital_cir2) && !empty($path_hospital_cir2)) {
                    move_uploaded_file($tmpname_hospital_cir2, $path_hospital_cir2);
                }

                $res['status'] = 100;
                $res['msg'] = 'Successfully Insert';
            } else {
                $res['status'] = 101;
                $res['msg'] = 'An Error Occured';
            }
        }
    }
}

echo json_encode($res);
