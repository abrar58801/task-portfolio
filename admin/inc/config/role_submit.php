<?php
require_once("./class/config.php");

$res = array();

// Sanitize and validate input

if (!empty($_POST['roleName'])) {
    $new_roleName = implode("$;", $_POST['roleName']);
    $new_roleName = filter($new_roleName);
} else {
    $res["status"] = 101;
    $res["msg"] = "Please provide at least one role name.";
}




// Sanitize and validate other input
if (isset($_POST["new_role_name"]) && !empty(filter($_POST["new_role_name"]))) {
    $new_role_name = filter($_POST["new_role_name"]);
} else {
    $res["status"] = 101;
    $res["msg"] = "Display name is required";
}

if (isset($_POST["hidden_id"]) && !empty(filter($_POST["hidden_id"]))) {
    $hidden_id = filter($_POST["hidden_id"]);
} else {
    $hidden_id = '';
}

if (!isset($res["status"])) {


// Combine role names and permissions
$combined_data = array();

$keyArray = [];
if (isset($new_roleName)) {

    // Sanitize and validate input
if (!empty($_POST['role'])) {
    $new_role = "";
    foreach ($_POST['role'] as $key => $value) {
        // echo '<pre>';
// print_r($key);
// print_r($value);
$new_roleName = implode(",", $value);
$new_roleName = filter($new_roleName);
$rolePermission = explode(',', $new_roleName);
foreach($rolePermission as $rpData){
    $combined_data[$key][] = $rpData;

}
    }
} else {
    $res["status"] = 101;
    $res["msg"] = "Please select at least one permission.";
}
$finalData = json_encode($combined_data);

// echo '<pre>';
// print_r($finalData);

}
// die();


    $res["status"] = 101;
    $res["msg"] = "An Error Occurred";

    $finalData = json_encode($combined_data);

    if (!empty($hidden_id)) {

        $update_query = "UPDATE tbl_role SET name='$new_role_name', role='$finalData' WHERE id = $hidden_id ";

        $update = runUpdate($update_query);

        if ($update) {
            $res["status"] = 102;
            $res["msg"] = "Role updated successfully.";
        }
    } else {

        $insert_query = "INSERT INTO tbl_role (name, role) value ('$new_role_name', '$finalData')";
        $insert = runInsert($insert_query);

        if ($insert) {
            $res["status"] = 100;
            $res["msg"] = "Role added successfully.";
        }
    }
}

echo json_encode($res);
