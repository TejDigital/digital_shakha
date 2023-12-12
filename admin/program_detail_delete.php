<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['program_detail_delete'])){
    $id = $_POST['program_detail_delete_id'];
    $sql= "DELETE FROM `program_detail_tbl` WHERE program_detail_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./program_details.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./program_details.php');
    }
}
?>