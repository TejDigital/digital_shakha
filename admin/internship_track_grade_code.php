<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {

    $course = $_POST['course'];
    $app_id = $_POST['app_id'];
    $grade_status = $_POST['grade_status'];
    $weight = $_POST['weight'];
    $main_grade = $_POST['main_grade'];
    $duration = count($grade_status);

    for($i = 0; $i < $duration; $i++){
        $grade_status_new = $grade_status[$i];
        $weight_new = $weight[$i];
        $main_grade_new = $main_grade[$i];
        
        $sql = "INSERT INTO internship_grade_tbl(program,app_id,grade_status_main,grade_weight,grade_percent) VALUES ('$course','$app_id','$grade_status_new','$weight_new','$main_grade_new')";
        $stmt = mysqli_query($con,$sql);
    }

    if ($stmt) {
        $_SESSION['digi_meg'] = "Grade added";
        header('Location: ./grade.php?grade_id=' . $app_id);
    } else {
        $_SESSION['digi_meg'] = "Failed to add Grade: " . mysqli_error($con);
        header('Location: ./grade.php');
    }
}
?>
