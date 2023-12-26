<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($con, $_POST['end_time']);
    $description = $_POST['description'];
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $description = str_replace("'", "\'", $description);
    $image = $_FILES['image']['name'];

    if ($_FILES['image']['size'] > 7000000) {
        $_SESSION['digi_meg'] = "File is too big";
        header('Location: ./events.php');
        exit();
    }

    $image_ext = ['jpg', 'png', 'jpeg'];
    $file_ext = pathinfo($image, PATHINFO_EXTENSION);

    if (!in_array($file_ext, $image_ext)) {
        $_SESSION['digi_meg'] = "File must have jpg, png, or jpeg extension";
        header('Location: ./events.php');
        exit();
    }

    $sql = "INSERT INTO event_tbl(event_title, event_category,event_date, event_image, event_description, event_start_time, event_end_time, event_address) VALUES (?,?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sissssss", $name,$category ,$date, $image, $description, $start_time, $end_time, $address);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        move_uploaded_file($_FILES['image']['tmp_name'], './event_image/' . $image);
        $_SESSION['digi_meg'] = "Event Added";
        header('Location: ./events.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add event: " . mysqli_error($con);
        header('Location: ./events.php');
    }
}
?>
