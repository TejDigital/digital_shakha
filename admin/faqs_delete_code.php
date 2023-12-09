<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['faq_delete'])){
    $id = $_POST['faq_delete_id'];
    $sql= "DELETE FROM `faqs_tbl` WHERE faqs_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./faqs.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./faqs.php');
    }
}
?>