<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $heading = mysqli_real_escape_string($con, $_POST['heading']);
    $dropdown_heading = mysqli_real_escape_string($con, $_POST['dropdown_heading']);
    $day = mysqli_real_escape_string($con, $_POST['day']);
    // $description = mysqli_real_escape_string($con, $_POST['description']);
    $description = $_POST['description'];
    // $description = str_replace("'","\'",$description);
    // $dropdown_description = mysqli_real_escape_string($con, $_POST['dropdown_description']);
    $dropdown_description = $_POST['dropdown_description'];
    // $dropdown_description = str_replace("'","\'",$dropdown_description);
   
  
    $sql = "UPDATE program_detail_tbl SET program= ?,program_detail_heading= ?,program_detail_description= ? ,program_detail_dropdown_heading= ?,program_detail_dropdown_days= ? ,program_detail_dropdown_description= ?,program_detail_status=? WHERE program_detail_id =?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isssisii", $program_name, $heading, $description,$dropdown_heading,$day,$dropdown_description,$status, $id);
    mysqli_stmt_execute($stmt);


    if ($stmt) {
        $_SESSION['digi_meg'] = "image and detail Updated";
        header('Location: ./program_details.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating : " . mysqli_error($con);
        header('Location: ./program_details.php');
    }
}
