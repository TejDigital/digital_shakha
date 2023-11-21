<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $detail = $_POST['detail'];
    $old_img = $_POST['old_img'];
    $new_img = $_FILES['new_img']['name'];

    if ($new_img != '') {
        if ($_FILES['new_img']["size"] > 700000) {
            $_SESSION['digi_meg'] = " image size is to Big";
            header('location:./program_edit.php');
        }
        $img_ext = ['png', 'jpg', 'jpeg'];

        $file_ext = pathinfo($new_img, PATHINFO_EXTENSION);


        if (!in_array($file_ext, $img_ext)) {
            $_SESSION['digi_meg'] = "img only in jpg ,png or jpeg ext";
            header('location:./program_edit.php');
        }
        if (!empty($new_img)) {
            $updated_img = $new_img;
            move_uploaded_file($_FILES['new_img']['tmp_name'], './program_images/' . $new_img);
            unlink("./program_images/" . $old_img);
        } else {
            $updated_img = $old_img;
        }
        $sql = "UPDATE program_tbl SET program_name = '$name' , program_detail = '$detail' ,program_status = '$status' , program_image = '$updated_img' WHERE program_id = '$id'";
    } else {
        $sql = "UPDATE program_tbl SET program_name = '$name' , program_detail = '$detail' ,program_status = '$status' WHERE program_id = '$id'";
    }
    $sql_run = mysqli_query($con, $sql);
    if ($sql_run) {

        $_SESSION['digi_meg'] = "Program Updated";
        header('Location:./programs.php');
    } else {
        $_SESSION['digi_meg'] = "Something went wrong";
        header('Location:./programs.php');
    }
}
