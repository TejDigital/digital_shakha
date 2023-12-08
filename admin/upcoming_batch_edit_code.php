<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $mode = mysqli_real_escape_string($con, $_POST['mode']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($con, $_POST['end_time']);
    $availability = mysqli_real_escape_string($con, $_POST['availability']);

    $sql = "UPDATE upcoming_batch_tbl SET batch_name=?, batch_date=?,batch_start_time=?, batch_end_time=?,batch_address=?, batch_status=? , batch_mode=? , availability = ? WHERE batch_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "issssisii", $name, $date, $start_time, $end_time, $address, $status, $mode, $availability, $id);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Batch Updated";
        header('Location: ./upcoming_batches.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating event: " . mysqli_error($con);
        header('Location: ./upcoming_batches.php');
    }
}
