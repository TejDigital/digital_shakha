<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $list = mysqli_real_escape_string($con, $_POST['list']);


    $sql = "INSERT INTO program_outcome_tbl(program,program_outcome_list) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "is",$program_name,$list);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Program outcome Added";
        header('Location: ./program_outcome.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add outcome: " . mysqli_error($con);
        header('Location: ./program_outcome.php');
    }
}
?>
