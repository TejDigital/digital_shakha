<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $info_name = $_POST['info_name'];
    $info_name = str_replace("'" , "\'" , $info_name);


        $sql = "UPDATE internship_course_info_tbl SET program=? ,info_status= ? ,course_info = ? WHERE course_info_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "iisi", $name, $status, $info_name,$id);
        mysqli_stmt_execute($stmt);
    

    if ($stmt) {
        $_SESSION['digi_meg'] = "info Updated";
        header('Location: ./internship_track_course_info.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating info: " . mysqli_error($con);
        header('Location: ./internship_track_course_info.php');
    }
}
?>
