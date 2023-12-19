<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $price = mysqli_real_escape_string($con, $_POST['price']);
    // $course = mysqli_real_escape_string($con, $_POST['course']);


    $sql = "INSERT INTO application_price_tbl (price) VALUES (?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s",$price);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Price Added";
        header('Location: ./application_price.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add price: " . mysqli_error($con);
        header('Location: ./application_price.php');
    }
}
?>
