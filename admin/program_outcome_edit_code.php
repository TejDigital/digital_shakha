<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $list = mysqli_real_escape_string($con, $_POST['list']);
  

    $sql = "UPDATE program_outcome_tbl SET program =? , program_outcome_list =? , program_outcome_status = ?  WHERE program_outcome_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isii", $program_name,$list,$status,$id);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Program outcome Updated";
        header('Location: ./program_outcome.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating outcome: " . mysqli_error($con);
        header('Location: ./program_outcome.php');
    }
}
