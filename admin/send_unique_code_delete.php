<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['unique_code_delete'])){
    $id = $_POST['unique_code_id'];
    $sql= "DELETE FROM `unique_code_tbl` WHERE code_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./send_unique_code.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./send_unique_code.php');
    }
}
?>