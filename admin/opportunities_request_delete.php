<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['opportunities_request_table_delete'])){
    $id = $_POST['opportunities_request_table_delete_id'];
    $sql= "DELETE FROM `opportunities_request_tbl` WHERE opportunities_request_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./opportunities_request_table.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./opportunities_request_table.php');
    }
}
?>