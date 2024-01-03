<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $dropdown_heading = mysqli_real_escape_string($con, $_POST['dropdown_heading']);
    $day = mysqli_real_escape_string($con, $_POST['day']);
    // $description = str_replace("'","\'",$description);
    $dropdown_description = $_POST['dropdown_description'];
   
  
    $sql = "UPDATE program_accordion_tbl SET program= ?,program_detail_dropdown_heading= ?,program_detail_dropdown_days= ? ,program_detail_dropdown_description= ?,program_accordion_status	=? WHERE program_accordion_id =?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isisii", $program_name,$dropdown_heading,$day,$dropdown_description,$status, $id);
    mysqli_stmt_execute($stmt);


    if ($stmt) {
        $_SESSION['digi_meg'] = "image and accordion Updated";
        header('Location: ./program_accordion.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating : " . mysqli_error($con);
        header('Location: ./program_accordion.php');
    }
}
