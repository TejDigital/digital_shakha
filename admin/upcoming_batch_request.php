<?php
require('./config/dbcon.php');

$upcoming_batch_id = mysqli_real_escape_string($con,$_POST['upcoming_batch_id']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$designation = mysqli_real_escape_string($con,$_POST['designation']);
$location = mysqli_real_escape_string($con,$_POST['location']);

$sql = "INSERT INTO upcoming_batch_registration_tbl(upcoming_batch_id,name,phone,email,address,designation) VALUES ('$upcoming_batch_id','$name','$phone','$email','$location','$designation')";
$sql_run = mysqli_query($con,$sql);
if($sql_run){
    echo json_encode(array("res" => '1'));
}else{
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(array("res" => '0'));
}
?>