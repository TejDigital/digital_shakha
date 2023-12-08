<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
  
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $description = mysqli_real_escape_string($con, $_POST['description']);
    $description = str_replace("'", "\'", $description);


    $image = $_FILES['image']['name'];

    if ($_FILES['image']['size'] > 7000000) {
        $_SESSION['digi_meg'] = "File is too big";
        header('Location: ./home_testimonial.php');
        exit();
    }

    $img_ext = ['png', 'jpg', 'jpeg'];

    $file_ext = pathinfo($image, PATHINFO_EXTENSION);

   

    if (!in_array($file_ext,$img_ext)) {
        $_SESSION['digi_meg'] = "file only in jpg , png or jpeg ext";
        header('Location: ./home_testimonial.php');
        exit();
    }

    $sql = "INSERT INTO testimonial_tbl(test_name,test_image,test_description,test_address) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssss",$name,$image,$description,$address);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        move_uploaded_file($_FILES['image']['tmp_name'], './home_testimonial_images/' . $image);
        $_SESSION['digi_meg'] = "Testimonial Added";
        header('Location: ./home_testimonial.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add event: " . mysqli_error($con);
        header('Location: ./home_testimonial.php');
    }
}
?>
