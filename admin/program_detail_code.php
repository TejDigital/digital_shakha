<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $heading = mysqli_real_escape_string($con, $_POST['heading']);
    $dropdown_heading = mysqli_real_escape_string($con, $_POST['dropdown_heading']);
    $day = mysqli_real_escape_string($con, $_POST['day']);
     // $description = mysqli_real_escape_string($con, $_POST['description']);
     $description = $_POST['description'];
     // $description = str_replace("'","\'",$description);
     // $dropdown_description = mysqli_real_escape_string($con, $_POST['dropdown_description']);
     $dropdown_description = $_POST['dropdown_description'];
     // $dropdown_description = str_replace("'","\'",$dropdown_description);


    $sql = "INSERT INTO program_detail_tbl(program,program_detail_heading,program_detail_description,program_detail_dropdown_heading,program_detail_dropdown_days,program_detail_dropdown_description) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isssis",$program_name,$heading,$description,$dropdown_heading,$day,$dropdown_description);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Program detail Added";
        header('Location: ./program_details.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add detail: " . mysqli_error($con);
        header('Location: ./program_details.php');
    }
}
?>
