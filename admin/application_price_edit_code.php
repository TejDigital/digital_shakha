<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    // $course = mysqli_real_escape_string($con, $_POST['course']);
  

    $sql = "UPDATE application_price_tbl SET price=? ,price_status=? WHERE price_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sii", $price ,$status, $id);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "price Updated";
        header('Location: ./application_price.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating price: " . mysqli_error($con);
        header('Location: ./application_price.php');
    }
}
