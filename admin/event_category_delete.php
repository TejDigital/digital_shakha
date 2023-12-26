<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['event_category_delete'])){
    $id = $_POST['event_category_delete_id'];
    $sql= "DELETE FROM `event_category_tbl` WHERE event_category_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./event_category.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./event_category.php');
    }
}
?>