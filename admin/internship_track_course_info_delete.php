<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['info_delete'])){
    $id = $_POST['info_delete_id'];
    $sql= "DELETE FROM `internship_course_info_tbl` WHERE course_info_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./internship_track_course_info.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./internship_track_course_info.php');
    }
}
?>