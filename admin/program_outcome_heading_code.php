<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $heading = mysqli_real_escape_string($con, $_POST['heading']);


    $sql = "INSERT INTO program_outcome_heading(program,heading) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "is",$program_name,$heading);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Program outcome heading Added";
        header('Location: ./program_outcome_heading.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add outcome heading: " . mysqli_error($con);
        header('Location: ./program_outcome_heading.php');
    }
}
?>
