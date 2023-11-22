<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['seasonal_placement_delete'])){
    $id = $_POST['seasonal_placement_id'];
    $sql= "DELETE FROM `seasonal_placement_tbl` WHERE placement_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./seasonal_placement.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./seasonal_placement.php');
    }
}
?>