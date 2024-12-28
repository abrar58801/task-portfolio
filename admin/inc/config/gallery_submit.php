<?php
require "./class/config.php";

$res = [];

if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if ($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
        $image = strtotime(date("Y-m-d-h:i")) . "_" . rand(100000, 9999999) . "." . $extension;
        $path = "../../../upload/" . $image;
    } else {
        $res['status'] = 101;
        $res['msg'] = 'Select An Proper Image !!';
    }
} elseif (isset($_POST['hidden_image']) && !empty($_POST['hidden_image'])) {
    $image = filter($_POST['hidden_image']);
} else {
    $res['status'] = 101;
    $res['msg'] = "Image is required";
}

if (isset($_POST['title']) && !empty($_POST['title'])) {
    $title = filter($_POST['title']);
} else {
    $res['msg'] = 'Title is required';
    $res['status'] = 101;
}

if (isset($_POST['hidden_id']) && !empty($_POST['hidden_id'])) {
    $id = filter($_POST['hidden_id']);
}

if (!$res) {
    if (isset($id) && intval($id)) {
        $update_query = "UPDATE tbl_gallery SET title='$title', image='$image' WHERE id = '$id'";

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
    } else {

        $insert_query = "INSERT INTO tbl_gallery (title, image) VALUE ('$title', '$image')";

        $insert = runInsert($insert_query);
        if ($insert) {
            if (isset($path) && !empty($path)) {
                move_uploaded_file($tmpname, $path);
            }

            $res['status'] = 100;
            $res['msg'] = 'Successfully Insert';
        } else {
            $res['status'] = 101;
            $res['msg'] = 'An Error Occured';
        }
    }
}

echo json_encode($res);
