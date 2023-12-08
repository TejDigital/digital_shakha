<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['program_delete'])){
    $id = $_POST['program_delete_id'];
    $sql= "DELETE FROM `program_tbl` WHERE program_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./programs.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./programs.php');
    }
}
?>