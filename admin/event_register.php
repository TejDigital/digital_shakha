<?php
require('./config/dbcon.php');

$name = mysqli_real_escape_string($con,$_POST['name']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$event = mysqli_real_escape_string($con,$_POST['event']);

$sql = "INSERT INTO event_register_tbl(name, phone, email,event) VALUES ('$name','$phone','$email','$event')";
$sql_run = mysqli_query($con,$sql);
if($sql_run){
    echo json_encode(array("res" => '1'));
}else{
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(array("res" => '0'));
}
?>