<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['program_testimonial_delete'])){
    $id = $_POST['program_testimonial_delete_id'];
    $sql= "DELETE FROM `program_testimonial_tbl` WHERE program_testimonial_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./program_testimonial.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./program_testimonial.php');
    }
}
?>