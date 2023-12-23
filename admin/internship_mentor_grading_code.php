<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {

    $std_name = mysqli_real_escape_string($con, $_POST['std_name']);
    $mentor_grading = mysqli_real_escape_string($con, $_POST['mentor_grading']);
    $milestone_completed = mysqli_real_escape_string($con, $_POST['milestone_completed']);
  
    $sql = "INSERT INTO internship_mentor_grading_tbl(app_id, mentor_grading, milestone_completed) VALUES (?,?,?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $std_name,$mentor_grading,$milestone_completed);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "mentor_grading added";
        header('Location: ./internship_mentor_grading.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add mentor_grading : " . mysqli_error($con);
        header('Location: ./internship_mentor_grading.php');
    }
}
?>
