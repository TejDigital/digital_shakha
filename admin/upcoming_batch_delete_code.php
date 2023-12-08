<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['batch_delete'])){
    $id = $_POST['batch_delete_id'];
    $sql= "DELETE FROM `upcoming_batch_tbl` WHERE batch_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./upcoming_batches.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./upcoming_batches.php');
    }
}
?>