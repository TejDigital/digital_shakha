<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['program_outcome_heading_delete'])){
    $id = $_POST['program_outcome_heading_delete_id'];
    $sql= "DELETE FROM `program_outcome_heading` WHERE outcome_heading_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./program_outcome_heading.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./program_outcome_heading.php');
    }
}
?>