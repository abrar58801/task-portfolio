<?php
require __DIR__ . "/class/config.php";

$response = [];

$ref_id = $collection = '';

if (isset($_POST['ref_id']) && filter($_POST['ref_id'])) {
    $ref_id = filter($_POST['ref_id']);
}
if (isset($_POST['collection']) && filter($_POST['collection'])) {
    $collection = $dataTables[filter($_POST['collection'])] ?? '';
}

$status = 0;
if (isset($_POST['status']) && filter($_POST['status'])) {
    $status = filter($_POST['status']);
}

if($ref_id && $collection){
    $updateQuery = "UPDATE $collection SET status = '{$status}' WHERE id = '{$ref_id}'";
    $update = runUpdate($updateQuery);

    if ($update) {
        $response['status'] = '100';
        $response['msg'] = 'Status Changed Successfully!!';
    } else {
        $response['status'] = '101';
        $response['msg'] = 'Oops.. Something wrong. Please try after sometime!!!';
    }
}
echo json_encode($response);
?>
