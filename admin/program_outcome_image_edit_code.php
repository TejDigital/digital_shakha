<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $heading1 = mysqli_real_escape_string($con, $_POST['heading1']);
    $heading2 = mysqli_real_escape_string($con, $_POST['heading2']);
    $heading3 = mysqli_real_escape_string($con, $_POST['heading3']);
    $description1 = mysqli_real_escape_string($con, $_POST['description1']);
    $description2 = mysqli_real_escape_string($con, $_POST['description2']);
    $description3 = mysqli_real_escape_string($con, $_POST['description3']);

    $old_image = mysqli_real_escape_string($con, $_POST['old_image']);
    $new_image = $_FILES['new_image']['name'];

    if ($_FILES['new_image']["size"] > 7000000) {
        $_SESSION['digi_meg'] = "File size is too big";
        header('Location: ./program_outcome_image_edit.php?id=' . $id . '');
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
        move_uploaded_file($_FILES['new_image']['tmp_name'], './program_view_images/' . $new_image);
        unlink("./program_view_images/" . $old_image);
    }
    $sql = "UPDATE program_image_tbl SET program= ?,program_view_image= ?,program_image_heading_1= ? ,program_image_description_1= ?,program_image_heading_2= ? ,program_image_description_2= ?,program_image_heading_3= ? ,program_image_description_3= ? ,program_image_status=? WHERE program_image_id =?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isssssssii", $program_name, $updated_image, $heading1, $description1, $heading2, $description2, $heading3, $description3, $status, $id);
    mysqli_stmt_execute($stmt);


    if ($stmt) {
        $_SESSION['digi_meg'] = "image and detail Updated";
        header('Location: ./program_outcome_image.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating : " . mysqli_error($con);
        header('Location: ./program_outcome_image.php');
    }
}
