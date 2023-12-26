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
    $description = $_POST['description'];
    $description = str_replace("'", "\'", $description);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $old_image = mysqli_real_escape_string($con, $_POST['old_image']);
    $new_image = $_FILES['new_image']['name'];
    $updated_image = $old_image;
    if ($new_image != '') {
        if ($_FILES['new_image']["size"] > 7000000) {
            $_SESSION['digi_meg'] = "File size is too big";
            header('Location: ./event_edit.php?id=' . $id . '');
            exit();
        }

        $image_ext = ['jpg', 'png', 'jpeg'];
        $file_ext = pathinfo($new_image, PATHINFO_EXTENSION);

        if (!in_array($file_ext, $image_ext)) {
            $_SESSION['digi_meg'] = "File must have jpg, png, or jpeg extension";
            header('Location: ./event_edit.php?id=' . $id . '');
            exit();
        }

        if (!empty($new_image)) {
            $updated_image = $new_image;
            move_uploaded_file($_FILES['new_image']['tmp_name'], './event_image/' . $new_image);
            unlink("./program_image/" . $old_image);
        }

        $sql = "UPDATE event_tbl SET event_title=?, event_category=?, event_date=?, event_image=?, event_description=?, event_start_time=?, event_end_time=?, event_address=?, event_status=? WHERE event_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sissssssii", $name, $category, $date, $updated_image, $description, $start_time, $end_time, $address, $status, $id);
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
