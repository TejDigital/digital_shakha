<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['grading_delete'])){
    $id = $_POST['grading_delete_id'];
    $sql= "DELETE FROM `internship_mentor_grading_tbl` WHERE mentor_grading_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./internship_mentor_grading.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./internship_mentor_grading.php');
    }
}
?>