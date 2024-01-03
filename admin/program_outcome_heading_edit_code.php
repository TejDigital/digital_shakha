<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $heading = mysqli_real_escape_string($con, $_POST['heading']);
  

    $sql = "UPDATE program_outcome_heading SET program =? , heading =? , outcome_status = ?  WHERE outcome_heading_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isii", $program_name,$heading,$status,$id);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Program outcome Updated heading";
        header('Location: ./program_outcome_heading.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating outcome heading: " . mysqli_error($con);
        header('Location: ./program_outcome_heading.php');
    }
}
