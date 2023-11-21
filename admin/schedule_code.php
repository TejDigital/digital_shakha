<?php
require('./config/dbcon.php');

$name = $_POST['name'];
$unique_id = $_POST['unique_id'];
$date = $_POST['date'];
$time = $_POST['time'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$position = $_POST['position'];
$message = $_POST['message'];

$sql = "INSERT INTO schedule_interview_tbl(unique_id, name, email, phone, date, time, position, message) VALUES ('$unique_id','$name','$email','$phone','$date','$time','$position','$message')";

$sql_run = mysqli_query($con,$sql);

if($sql){
    echo "we are connect soon";
}else{
    echo"Something went wrong";
}
