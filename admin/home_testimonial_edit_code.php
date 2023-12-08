<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $old_image = mysqli_real_escape_string($con, $_POST['old_image']);
    $new_image = $_FILES['new_image']['name'];
    if($new_image != ''){

    

        if ($_FILES['new_image']["size"] > 7000000) {
            $_SESSION['digi_meg'] = "File size is too big";
            header('Location: ./home_testimonial_edit.php?id='.$id.'');
            exit();
        }

        $img_ext = ['png', 'jpg', 'jpeg'];
        $file_ext = pathinfo($new_image, PATHINFO_EXTENSION);

        if (!in_array($file_ext,$img_ext)) {
            $_SESSION['digi_meg'] = "file only in jpg , png or jpeg ext";
            header('Location: ./home_testimonial_edit.php?id='.$id.'');
            exit();
        }
        }

        $updated_image = $old_image;
        if (!empty($new_image) && $_FILES['new_image']['error'] == UPLOAD_ERR_OK) {
            $updated_image = $new_image;
            move_uploaded_file($_FILES['new_image']['tmp_name'], './home_testimonial_images/' . $new_image);
            unlink("./home_testimonial_images/" . $old_image);
        }

        $sql = "UPDATE testimonial_tbl SET test_name=?,test_image=?,test_description=?,test_status=? ,test_address=?  WHERE test_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssisi", $name,$updated_image, $description,$status,$address,$id);
        mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Testimonial Updated";
        header('Location: ./home_testimonial.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating event: " . mysqli_error($con);
        header('Location: ./home_testimonial.php');
    }
}
?>
