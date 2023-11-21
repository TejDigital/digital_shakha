<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $unique_id = $_POST['unique_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $message = $_POST['message'];
    $interview_status = $_POST['interview_status'];

    $sql = "UPDATE schedule_interview_tbl SET interview_status = '$interview_status' , name = '$name' , unique_id = '$unique_id' , email = '$email' , phone = '$phone' , position = '$position' , date = '$date' , time = '$time', message = '$message' WHERE id= '$id'";

    $sql_run = mysqli_query($con , $sql);

    if ($sql_run) {
        $_SESSION['digi_meg'] = "Update done";
        header('Location:./schedule_interview.php');
    } else {
        $_SESSION['digi_meg'] = "Failed";
        header('Location:./schedule_interview.php');
    }
}

