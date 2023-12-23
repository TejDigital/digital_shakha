<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $info_name = $_POST['info_name'];
    $info_name = str_replace("'" , "\'" , $info_name);
    // $info_name = str_replace("'" , "\'" , $info_name);


   

    $sql = "INSERT INTO internship_course_info_tbl(program,course_info) VALUES (?,?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "is", $name,$info_name);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Course info added";
        header('Location: ./internship_track_course_info.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add info: " . mysqli_error($con);
        header('Location: ./internship_track_course_info.php');
    }
}
?>
