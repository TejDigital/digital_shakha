<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
 
        $sql = "UPDATE event_category_tbl SET event_category_name = ? ,event_category_status =? WHERE event_category_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sii", $name ,$status, $id);
        mysqli_stmt_execute($stmt);
    

    if ($stmt) {
        $_SESSION['digi_meg'] = "category Updated";
        header('Location: ./event_category.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating event: " . mysqli_error($con);
        header('Location: ./event_category.php');
    }
}
?>
