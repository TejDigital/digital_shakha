<?php
require('./config/dbcon.php');

$request_id = mysqli_real_escape_string($con,$_POST['request_id']);
$message = $_POST['message'];
$message = str_replace("'","\'",$message);


$sql = "INSERT INTO internship_request_msg_tbl(app_id,request_msg) VALUES ('$request_id','$message')";
$sql_run = mysqli_query($con,$sql);
if($sql_run){
    echo json_encode(array("res" => '1'));
}else{
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(array("res" => '0'));
}
?>