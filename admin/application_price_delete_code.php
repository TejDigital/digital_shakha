<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['price_delete'])){
    $id = $_POST['price_delete_id'];
    $sql= "DELETE FROM `application_price_tbl` WHERE price_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./application_price.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./application_price.php');
    }
}
?>