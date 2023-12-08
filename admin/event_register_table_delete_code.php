<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['event_register_table_delete'])){
    $id = $_POST['event_register_table_delete_id'];
    $sql= "DELETE FROM `event_register_tbl` WHERE id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./event_register_table.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./event_register_table.php');
    }
}
?>