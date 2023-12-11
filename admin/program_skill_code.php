<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $skill = mysqli_real_escape_string($con, $_POST['skill']);


    $sql = "INSERT INTO program_skill_tbl(program,program_skill_name) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "is",$program_name,$skill);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Program Skill Added";
        header('Location: ./program_skill.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add skill: " . mysqli_error($con);
        header('Location: ./program_skill.php');
    }
}
?>
