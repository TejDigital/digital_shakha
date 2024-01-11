<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['internship_request_msg_delete'])){
    $id = $_POST['internship_request_msg_delete_id'];
    $sql= "DELETE FROM `internship_request_msg_tbl` WHERE request_id  = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./internship_track_request_msg.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./internship_track_request_msg.php');
    }
}
?>