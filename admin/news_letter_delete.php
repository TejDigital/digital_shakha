<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['news_letter_delete'])){
    $id = $_POST['news_letter_delete_id'];
    $sql= "DELETE FROM `news_letter_tbl` WHERE news_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./news_letter.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./news_letter.php');
    }
}
?>