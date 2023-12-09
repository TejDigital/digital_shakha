<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['blog_delete'])){
    $id = $_POST['blog_delete_id'];
    $sql= "DELETE FROM `blog_tbl` WHERE blog_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./blog.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./blog.php');
    }
}
?>