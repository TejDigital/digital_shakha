<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $dropdown_heading = mysqli_real_escape_string($con, $_POST['dropdown_heading']);
    $day = mysqli_real_escape_string($con, $_POST['day']);
    $description = $_POST['description'];

    $dropdown_description = $_POST['dropdown_description'];


    $sql = "INSERT INTO program_accordion_tbl(program,program_detail_dropdown_heading,program_detail_dropdown_days,program_detail_dropdown_description) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isis", $program_name, $dropdown_heading, $day, $dropdown_description);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Program accordion Added";
        header('Location: ./program_accordion.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add accordion: " . mysqli_error($con);
        header('Location: ./program_accordion.php');
    }
}
