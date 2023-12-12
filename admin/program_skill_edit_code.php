<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $skill = mysqli_real_escape_string($con, $_POST['skill']);
  

    $sql = "UPDATE program_skill_tbl SET program =? , program_skill_name =? , program_skill_status = ?  WHERE program_skill_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isii", $program_name,$skill,$status,$id);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Program skill Updated";
        header('Location: ./program_skill.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating skill: " . mysqli_error($con);
        header('Location: ./program_skill.php');
    }
}
