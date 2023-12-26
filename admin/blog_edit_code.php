<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
  
    $description = $_POST['description'];
    $description = str_replace("'", "\'", $description);

    $mini_description =  $_POST['mini_description'];
    $mini_description = str_replace("'", "\'", $mini_description);
    
    $old_image = mysqli_real_escape_string($con, $_POST['old_image']);
    $new_image = $_FILES['new_image']['name'];

    if ($new_image != '') {
        if ($_FILES['new_image']["size"] > 7000000) {
            $_SESSION['digi_meg'] = "File size is too big";
            header('Location: ./blog_edit.php?id='.$id.'');
            exit();
        }

        $image_ext = ['png', 'jpg', 'jpeg'];
        $file_ext = pathinfo($new_image, PATHINFO_EXTENSION);

        if (!in_array($file_ext, $image_ext)) {
            $_SESSION['digi_meg'] = "File must have png, jpg, or jpeg extension";
            header('Location: ./blog_edit.php?id='.$id.'');
            exit();
        }

        if (!empty($new_image)) {
            $updated_image = $new_image;
            move_uploaded_file($_FILES['new_image']['tmp_name'], './blog_images/' . $new_image);
            unlink("./blog_images/" . $old_image);
        } else {
            $updated_image = $old_image;
        }

        $sql = "UPDATE blog_tbl SET blog_name=?, blog_date=?, blog_image=?, blog_description=?,blog_status=? ,blog_mini_description=? , blog_category = ? WHERE blog_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssssisii", $name, $date, $updated_image, $description, $status, $mini_description, $category , $id);
        mysqli_stmt_execute($stmt);
    } else {
        $sql = "UPDATE blog_tbl SET blog_name=?, blog_date=?, blog_description=?,blog_status=? ,blog_mini_description=? , blog_category = ? WHERE blog_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssisii", $name, $date, $description, $status, $mini_description, $category , $id);
        mysqli_stmt_execute($stmt);
    }

    if ($stmt) {
        $_SESSION['digi_meg'] = "blog Updated";
        header('Location: ./blog.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating event: " . mysqli_error($con);
        header('Location: ./blog.php');
    }
}
?>
