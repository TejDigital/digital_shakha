<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['certificate_delete'])){
    $id = $_POST['certificate_delete_id'];
    $sql= "DELETE FROM `internship_certificate_tbl` WHERE certificate_id  = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./internship_certificate.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./internship_certificate.php');
    }
}
?>