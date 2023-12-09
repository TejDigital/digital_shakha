<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
  
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $description = str_replace("'", "\'", $description);

    $mini_description = mysqli_real_escape_string($con, $_POST['mini_description']);
    $mini_description = str_replace("'", "\'", $mini_description);
    $image = $_FILES['image']['name'];

    if ($_FILES['image']['size'] > 7000000) {
        $_SESSION['digi_meg'] = "File is too big";
        header('Location: ./blog.php');
        exit();
    }

    $image_ext = ['png', 'jpg', 'jpeg'];
    $file_ext = pathinfo($image, PATHINFO_EXTENSION);

    if (!in_array($file_ext, $image_ext)) {
        $_SESSION['digi_meg'] = "File must have png, jpg, or jpeg extension";
        header('Location: ./blog.php');
        exit();
    }

    $sql = "INSERT INTO blog_tbl(blog_name,blog_date,blog_category,blog_description,blog_mini_description,blog_image) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $name,$date,$category,$description,$mini_description,$image);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        move_uploaded_file($_FILES['image']['tmp_name'], './blog_images/' . $image);
        $_SESSION['digi_meg'] = "blog Added";
        header('Location: ./blog.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add event: " . mysqli_error($con);
        header('Location: ./blog.php');
    }
}
?>
