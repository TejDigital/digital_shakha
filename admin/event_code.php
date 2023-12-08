<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($con, $_POST['end_time']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $description = str_replace("'", "\'", $description);
    $video = $_FILES['video']['name'];

    if ($_FILES['video']['size'] > 15000000) {
        $_SESSION['digi_meg'] = "File is too big";
        header('Location: ./events.php');
        exit();
    }

    $video_ext = ['mp4', 'avi', 'mov'];
    $file_ext = pathinfo($video, PATHINFO_EXTENSION);

    if (!in_array($file_ext, $video_ext)) {
        $_SESSION['digi_meg'] = "File must have mp4, avi, or mov extension";
        header('Location: ./events.php');
        exit();
    }

    $sql = "INSERT INTO event_tbl(event_title, event_date, event_video, event_description, event_start_time, event_end_time, event_address) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $date, $video, $description, $start_time, $end_time, $address);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        move_uploaded_file($_FILES['video']['tmp_name'], './event_videos/' . $video);
        $_SESSION['digi_meg'] = "Event Added";
        header('Location: ./events.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add event: " . mysqli_error($con);
        header('Location: ./events.php');
    }
}
?>
