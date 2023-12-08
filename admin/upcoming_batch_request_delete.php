<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['batch_request_table_delete'])){
    $id = $_POST['batch_request_table_delete_id'];
    $sql= "DELETE FROM `upcoming_batch_registration_tbl` WHERE batch_register_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./upcoming_batch_request_table.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./upcoming_batch_request_table.php');
    }
}
?>