<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $std_name = mysqli_real_escape_string($con, $_POST['std_name']);
    $mentor_grading = mysqli_real_escape_string($con, $_POST['mentor_grading']);
    $milestone_completed = mysqli_real_escape_string($con, $_POST['milestone_completed']);


    $sql = "UPDATE internship_mentor_grading_tbl SET app_id=? ,mentor_grading_status= ? ,mentor_grading = ?, milestone_completed = ? WHERE mentor_grading_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "iiiii", $std_name, $status, $mentor_grading, $milestone_completed, $id);
    mysqli_stmt_execute($stmt);


    if ($stmt) {
        $_SESSION['digi_meg'] = "mentor_grading Updated";
        header('Location: ./internship_mentor_grading.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating mentor_grading: " . mysqli_error($con);
        header('Location: ./internship_mentor_grading.php');
    }
}
