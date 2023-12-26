<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
   

    $sql = "INSERT INTO event_category_tbl(event_category_name) VALUES (?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Category Added";
        header('Location: ./event_category.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add event: " . mysqli_error($con);
        header('Location: ./event_category.php');
    }
}
?>
