<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['material_delete'])){
    $id = $_POST['material_delete_id'];
    $sql= "DELETE FROM `internship_course_material_tbl` WHERE course_material_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./internship_track_course_material.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./internship_track_course_material.php');
    }
}
?>