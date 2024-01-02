<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['seasonal_place_request_table_delete'])){
    $id = $_POST['seasonal_place_request_table_delete_id'];
    $sql= "DELETE FROM `placement_view_tbl` WHERE seasonal_place_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./seasonal_place_request_table.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./seasonal_place_request_table.php');
    }
}
?>