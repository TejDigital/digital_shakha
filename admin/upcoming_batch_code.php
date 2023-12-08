<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $mode = mysqli_real_escape_string($con, $_POST['mode']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($con, $_POST['end_time']);

    $sql = "INSERT INTO upcoming_batch_tbl(batch_name,batch_date,batch_start_time,batch_end_time,batch_address,batch_mode) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isssss",$name,$date,$start_time, $end_time, $address,$mode);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Batch Added";
        header('Location: ./upcoming_batches.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add event: " . mysqli_error($con);
        header('Location: ./upcoming_batches.php');
    }
}
?>
