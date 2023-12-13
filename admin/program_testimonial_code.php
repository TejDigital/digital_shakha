<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description =  $_POST['description'];
    $image = $_FILES['image']['name'];
    
    if ($_FILES['image']['size'] > 7000000) {
        $_SESSION['digi_meg'] = "File is too big";
        header('Location: ./program_testimonial.php');
        exit();
    }

    $image_ext = ['png', 'jpg', 'jpeg'];
    $file_ext = pathinfo($image, PATHINFO_EXTENSION);

    if (!in_array($file_ext, $image_ext)) {
        $_SESSION['digi_meg'] = "File must have png, jpg, or jpeg extension";
        header('Location: ./program_testimonial.php');
        exit();
    }

    $sql = "INSERT INTO program_testimonial_tbl(program,program_testimonial_image,program_testimonial_text,program_testimonial_name) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "isss",$program_name,$image,$description,$name);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        move_uploaded_file($_FILES['image']['tmp_name'], './program_testimonial_images/' . $image);
        $_SESSION['digi_meg'] = "testimonial Added";
        header('Location: ./program_testimonial.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add testimonial: " . mysqli_error($con);
        header('Location: ./program_testimonial.php');
    }
}
