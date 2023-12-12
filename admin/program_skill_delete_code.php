<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['program_skill_delete'])){
    $id = $_POST['program_skill_delete_id'];
    $sql= "DELETE FROM `program_skill_tbl` WHERE program_skill_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./program_skill.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./program_skill.php');
    }
}
?>