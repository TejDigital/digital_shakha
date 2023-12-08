<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['home_testimonial_delete'])){
    $id = $_POST['home_testimonial_delete_id'];
    $sql= "DELETE FROM `testimonial_tbl` WHERE test_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./home_testimonial.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./home_testimonial.php');
    }
}
?>