<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
  
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);

    $description = $_POST['description'];
    $description = str_replace("'", "\'", $description);

    $tips = $_POST['tips'];
    $tips = str_replace("'", "\'", $tips);

    $image = $_FILES['image']['name'];

    if ($_FILES['image']['size'] > 7000000) {
        $_SESSION['digi_meg'] = "File is too big";
        header('Location: ./success_story.php');
        exit();
    }

    $img_ext = ['png', 'jpg', 'jpeg'];

    $file_ext = pathinfo($image, PATHINFO_EXTENSION);

   

    if (!in_array($file_ext,$img_ext)) {
        $_SESSION['digi_meg'] = "file only in jpg , png or jpeg ext";
        header('Location: ./success_story.php');
        exit();
    }

    $sql = "INSERT INTO success_story_tbl(name,image,description,designation,tips) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssss",$name,$image,$description,$designation,$tips);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        move_uploaded_file($_FILES['image']['tmp_name'], './success_story_images/' . $image);
        $_SESSION['digi_meg'] = "Story Added";
        header('Location: ./success_story.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add event: " . mysqli_error($con);
        header('Location: ./success_story.php');
    }
}
?>
