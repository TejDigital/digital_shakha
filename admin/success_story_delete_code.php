<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['story_delete'])){
    $id = $_POST['story_delete_id'];
    $sql= "DELETE FROM `success_story_tbl` WHERE story_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./success_story.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./success_story.php');
    }
}
?>