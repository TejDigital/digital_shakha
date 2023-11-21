<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['interview_delete'])){
    $id = $_POST['interview_delete_id'];
    $sql= "DELETE FROM `schedule_interview_tbl` WHERE id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./schedule_interview.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./schedule_interview.php');
    }
}
?>