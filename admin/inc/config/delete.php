<?php
require __DIR__."/class/config.php";

$response = [];

$ref_id = $collection = '';

if (isset($_POST['ref_id']) && filter($_POST['ref_id'])) {
    $ref_id = filter($_POST['ref_id']);
}
if (isset($_POST['collection']) && filter($_POST['collection'])) {
    $collection = $dataTables[filter($_POST['collection'])] ?? '';
}
if(isset($_POST['files']) && filter($_POST['files'])){
    $files = filter($_POST['files']);
}
if ($collection && $ref_id) {
    $selectFiles = [];
    if(isset($files) && $files){
        $selectFiles = runFatch("SELECT $files FROM $collection WHERE id = '{$ref_id}'");
    }
    $deleteQuery = "DELETE FROM $collection WHERE id = '{$ref_id}'";

    $delete = runDelete($deleteQuery);

    if ($delete) {
        $response['status'] = '100';
        $response['msg'] = 'Deleted !!';
        if($selectFiles){
            foreach($selectFiles[0] as $flie){
                if(file_exists('../../../upload'.$flie)){
                    unlink('../../../upload/'.$flie);
                }
            }
        }
    } else {
        $response['status'] = '101';
        $response['msg'] = 'Failed';
    }
}

echo json_encode($response);
?>