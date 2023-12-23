<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {

    $app_id = $_POST['app_id'];
    $id = $_POST['id'];
    $grade_status = $_POST['grade_status'];
    $weight = $_POST['weight'];
    $main_grade = $_POST['main_grade'];
 

    $sql = "UPDATE internship_grade_tbl SET grade_status_main='$grade_status',grade_weight='$weight',grade_percent='$main_grade' WHERE grade_id = '$id'";
    $stmt = mysqli_query($con, $sql);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Grade Updated";
        header('Location: ./grade.php?grade_id=' . $app_id);
    } else {
        $_SESSION['digi_meg'] = "Failed to update Grade: " . mysqli_error($con);
        header('Location: ./grade.php?grade_id=' . $app_id);
    }
}
