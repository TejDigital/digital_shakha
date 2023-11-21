<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['app_delete'])){
    $id = $_POST['app_delete_id'];
    $sql= "DELETE FROM `application_tbl` WHERE id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./application.php');
    }else{
        $_SESSION['digi_meg'] = "deletaion Failed";
        header('Location:./application.php');
    }
}
?>