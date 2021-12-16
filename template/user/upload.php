<?php


//code for image uploading
if ($_FILES['upload-image']['name']) {

    $name = $_FILES["upload-image"]["name"];
    $rep = explode(".", $name);
    $ext = end($rep);

//    $dir_path = dirname(__FILE__);
    $img = "fileUpload/" . time() . "-TTH-USR-" . rand(1111, 9999) . "." . $ext;
    move_uploaded_file($_FILES['upload-image']['tmp_name'], $img);
    $result = new stdClass();
    $result->statusCode = 200;
    $result->result = 'success';

    $result->message = $img;
    echo json_encode($result);

} else {
    $result = new stdClass();
    $result->statusCode = 401;
    $result->result = 'failed';
    echo json_encode($result);
}

?>