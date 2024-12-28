<?php
require "./class/config.php";

$res = [];

if (isset($_FILES['about_image']) && !empty($_FILES['about_image']['name'])) {
    $filename = $_FILES['about_image']['name'];
    $tmpname = $_FILES['about_image']['tmp_name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if ($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
        $about_image = strtotime(date("Y-m-d-h:i")) . "_" . rand(100000, 9999999) . "." . $extension;
        $path = "../../../upload/" . $about_image;
    } else {
        $res['status'] = 101;
        $res['msg'] = 'Select An Proper About Image !!';
    }
} elseif (isset($_POST['hidden_about_image']) && !empty($_POST['hidden_about_image'])) {
    $about_image = filter($_POST['hidden_about_image']);
} else {
    $res['status'] = 101;
    $res['msg'] = "About Image is required";
}

if (isset($_POST['about_des']) && !empty($_POST['about_des'])) {
    $about_des = filter($_POST['about_des']);
} else {
    $res['msg'] = 'About description is required';
    $res['status'] = 101;
}

if (isset($_POST['about_title']) && !empty($_POST['about_title'])) {
    $about_title = filter($_POST['about_title']);
} else {
    $res['msg'] = 'About title is required';
    $res['status'] = 101;
}

if (isset($_POST['hidden_id']) && !empty($_POST['hidden_id'])) {
    $id = filter($_POST['hidden_id']);
}

if (!$res) {
    $update_query = "UPDATE tbl_about SET about_title='$about_title',
                                             about_des='$about_des',
                                             about_image='$about_image' WHERE id = '$id'";

    $update = runUpdate($update_query);
    if ($update) {
        if (isset($path) && !empty($path)) {
            move_uploaded_file($tmpname, $path);
        }

        $res['status'] = 102;
        $res['msg'] = 'Successfully Updated';
    } else {
        $res['status'] = 101;
        $res['msg'] = 'An Error Occured';
    }
}

echo json_encode($res);
