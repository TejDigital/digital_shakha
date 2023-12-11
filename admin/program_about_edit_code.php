<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $description = str_replace("'","\'", $description);
  

    $sql = "UPDATE program_about_tbl SET program =? , program_about_text =? , program_about_status = ?  WHERE program_about_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssii", $program_name,$description,$status,$id);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Program About Updated";
        header('Location: ./program_about.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating about: " . mysqli_error($con);
        header('Location: ./program_about.php');
    }
}
