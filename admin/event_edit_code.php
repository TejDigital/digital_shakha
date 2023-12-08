<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($con, $_POST['end_time']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $description = str_replace("'", "\'", $description);
    $old_video = mysqli_real_escape_string($con, $_POST['old_video']);
    $new_video = $_FILES['new_video']['name'];

    if ($new_video != '') {
        if ($_FILES['new_video']["size"] > 15000000) {
            $_SESSION['digi_meg'] = "File size is too big";
            header('Location: ./event_edit.php?id='.$id.'');
            exit();
        }

        $video_ext = ['mp4', 'avi', 'mov'];
        $file_ext = pathinfo($new_video, PATHINFO_EXTENSION);

        if (!in_array($file_ext, $video_ext)) {
            $_SESSION['digi_meg'] = "File must have mp4, avi, or mov extension";
            header('Location: ./event_edit.php?id='.$id.'');
            exit();
        }

        if (!empty($new_video)) {
            $updated_video = $new_video;
            move_uploaded_file($_FILES['new_video']['tmp_name'], './event_videos/' . $new_video);
            unlink("./program_images/" . $old_video);
        } else {
            $updated_video = $old_video;
        }

        $sql = "UPDATE event_tbl SET event_title=?, event_date=?, event_video=?, event_description=?, event_start_time=?, event_end_time=?, event_address=?, event_status=? WHERE event_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssii", $name, $date, $updated_video, $description, $start_time, $end_time, $address, $status, $id);
        mysqli_stmt_execute($stmt);
    } else {
        $sql = "UPDATE event_tbl SET event_title=?, event_date=?, event_description=?, event_start_time=?, event_end_time=?, event_address=?, event_status=? WHERE event_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssii", $name, $date, $description, $start_time, $end_time, $address, $status, $id);
        mysqli_stmt_execute($stmt);
    }

    if ($stmt) {
        $_SESSION['digi_meg'] = "Event Updated";
        header('Location: ./events.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating event: " . mysqli_error($con);
        header('Location: ./events.php');
    }
}
?>
