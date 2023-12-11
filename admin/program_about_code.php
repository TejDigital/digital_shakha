<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $description = str_replace("'","\'", $description);


    $sql = "INSERT INTO program_about_tbl(program,program_about_text) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "is",$program_name,$description);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Program About Added";
        header('Location: ./program_about.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add about: " . mysqli_error($con);
        header('Location: ./program_about.php');
    }
}
?>
