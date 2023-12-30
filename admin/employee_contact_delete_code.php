<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['employee_contact_delete'])){
    $id = $_POST['employee_contact_delete_id'];
    $sql= "DELETE FROM `employee_contact_tbl` WHERE employee_id = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./employee_contact.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./employee_contact.php');
    }
}
?>