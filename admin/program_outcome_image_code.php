<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $heading1 = mysqli_real_escape_string($con, $_POST['heading1']);
    $heading2 = mysqli_real_escape_string($con, $_POST['heading2']);
    $heading3 = mysqli_real_escape_string($con, $_POST['heading3']);
    $description1 = mysqli_real_escape_string($con, $_POST['description1']);
    $description2 = mysqli_real_escape_string($con, $_POST['description2']);
    $description3 = mysqli_real_escape_string($con, $_POST['description3']);
    $image = $_FILES['image']['name'];
    if ($_FILES['image']['size'] > 7000000) {
        $_SESSION['digi_meg'] = "File is too big";
        header('Location: ./program_outcome_image.php');
        exit();
    }

    $image_ext = ['png', 'jpg', 'jpeg'];
    $file_ext = pathinfo($image, PATHINFO_EXTENSION);

    if (!in_array($file_ext, $image_ext)) {
        $_SESSION['digi_meg'] = "File must have png, jpg, or jpeg extension";
        header('Location: ./program_outcome_image.php');
        exit();
    }

    $sql = "INSERT INTO program_image_tbl(program,program_view_image,program_image_heading_1,program_image_heading_2,program_image_heading_3,program_image_description_1,program_image_description_2,program_image_description_3) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isssssss",$program_name,$image,$heading1,$heading2,$heading3,$description1,$description2,$description3);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        move_uploaded_file($_FILES['image']['tmp_name'], './program_view_images/' . $image);
        $_SESSION['digi_meg'] = "outcome Added";
        header('Location: ./program_outcome_image.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add outcome: " . mysqli_error($con);
        header('Location: ./program_outcome_image.php');
    }
}
