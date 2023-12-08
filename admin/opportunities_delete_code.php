<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['opportunities_delete'])){
    $id = $_POST['opportunities_delete_id'];
    $sql= "DELETE FROM `opportunities_tbl` WHERE opp_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./opportunities.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./opportunities.php');
    }
}
?>