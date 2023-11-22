<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['heading'];
    $status = $_POST['status'];
    $detail = $_POST['detail'];
    $date = $_POST['date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];

    $old_img1 = $_POST['old_img1'];
    $new_img1 = $_FILES['new_img1']['name'];

    $old_img2 = $_POST['old_img2'];
    $new_img2 = $_FILES['new_img2']['name'];

    if ($new_img1 != '' || $new_img2 != '') {
        if ($_FILES['new_img1']["size"] > 700000 || $_FILES['new_img2']["size"] > 700000) {
            $_SESSION['digi_meg'] = " image size is to Big";
            header('location:./seasonal_placement_edit.php');
        }
        $img_ext = ['png', 'jpg', 'jpeg'];

        $file_ext1 = pathinfo($new_img1, PATHINFO_EXTENSION);
        $file_ext2 = pathinfo($new_img2, PATHINFO_EXTENSION);


        if (!in_array($file_ext1, $img_ext) || !in_array($file_ext2, $img_ext)) {
            $_SESSION['digi_meg'] = "img only in jpg ,png or jpeg ext";
            header('location:./seasonal_placement_edit.php');
        }
        if (!empty($new_img1) || !empty($new_img2)) {

            if (!empty($new_img1)) {
                $updated_img_1 = $new_img1;
                move_uploaded_file($_FILES['new_img1']['tmp_name'], './seasonal_placement_images/' . $new_img1);
                unlink("./seasonal_placement_images/" . $old_img1);
            } else {
                $updated_img_1 = $old_img1;
            }

            if (!empty($new_img2)) {
                $updated_img_2 = $new_img2;
                move_uploaded_file($_FILES['new_img2']['tmp_name'], './seasonal_placement_images/' . $new_img2);
                unlink("seasonal_placement_images/" . $old_img2);
            } else {
                $updated_img_2 = $old_img2;
            }

        }

        $sql = "UPDATE seasonal_placement_tbl SET placement_name = '$name', placement_description = '$description', placement_detail = '$detail' ,placement_status = '$status' ,placement_date = '$date', placement_date_deadline = '$end_date' , placement_front_image = '$updated_img_1' ,placement_back_image = '$updated_img_2'  WHERE placement_id = '$id'";
    } else {
        $sql = "UPDATE seasonal_placement_tbl SET placement_name = '$name', placement_description = '$description' ,placement_detail = '$detail' ,placement_status = '$status' ,placement_date = '$date' , placement_date_deadline = '$end_date' WHERE placement_id = '$id'";
    }
    $sql_run = mysqli_query($con, $sql);
    if ($sql_run) {

        $_SESSION['digi_meg'] = "Seasonal Placement Updated";
        header('Location:./seasonal_placement.php');
    } else {
        $_SESSION['digi_meg'] = "Something went wrong";
        header('Location:./seasonal_placement.php');
    }
}
