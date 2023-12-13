<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description =  $_POST['description'];

    $old_image = mysqli_real_escape_string($con, $_POST['old_image']);
    $new_image = $_FILES['new_image']['name'];

    if ($_FILES['new_image']["size"] > 7000000) {
        $_SESSION['digi_meg'] = "File size is too big";
        header('Location: ./program_testimonial_edit.php?id=' . $id . '');
        exit();
    }

    // $image_ext = ['png', 'jpg', 'jpeg'];
    // $file_ext = pathinfo($new_image, PATHINFO_EXTENSION);

    // if (!in_array($file_ext, $image_ext)) {
    //     $_SESSION['digi_meg'] = "File must have png, jpg, or jpeg extension";
    //     header('Location: ./program_outcome_image_edit.php?id=' . $id . '');
    //     exit();
    // }

    $updated_image = $old_image;
    if (!empty($new_image)) {
        $updated_image = $new_image;
        move_uploaded_file($_FILES['new_image']['tmp_name'], './program_testimonial_images/' . $new_image);
        unlink("./program_testimonial_images/" . $old_image);
    }
    $sql = "UPDATE program_testimonial_tbl SET program= ?,program_testimonial_image = ?,program_testimonial_text = ? ,program_testimonial_name = ? ,program_testimonial_status = ? WHERE program_testimonial_id = ?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isssii", $program_name, $updated_image, $description,$name, $status, $id);
    mysqli_stmt_execute($stmt);


    if ($stmt) {
        $_SESSION['digi_meg'] = "testimonial Updated";
        header('Location: ./program_testimonial.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating : " . mysqli_error($con);
        header('Location: ./program_testimonial.php');
    }
}
