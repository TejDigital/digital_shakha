<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $heading = $_POST['heading'];
    $detail = $_POST['mini_detail'];
    $date = $_POST['date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];
    $front_image = $_FILES['front_image']['name'];
    $back_image = $_FILES['back_image']['name'];


    if ($_FILES['front_image']['size'] > 5000000 || $_FILES['back_image']['size'] > 5000000 ) {
        $_SESSION['digi_meg'] = "File is too big";
        header('location:./seasonal_placement.php');
    } else {
        $img_ext = ['png', 'jpg', 'jpeg'];

        $file_ext1 = pathinfo($front_image, PATHINFO_EXTENSION);
        $file_ext2 = pathinfo($back_image, PATHINFO_EXTENSION);

        if (!in_array($file_ext1, $img_ext) || !in_array($file_ext2, $img_ext)) {
            $_SESSION['cm_msg'] = "file only in jpg ,png or jpeg ext";
            header('location:./seasonal_placement.php');
        }else{
            $sql = "INSERT INTO seasonal_placement_tbl(placement_name,placement_detail,placement_date,placement_date_deadline,placement_front_image,placement_back_image,placement_description)VALUES('$heading','$detail','$date','$end_date','$front_image','$back_image','$description')";
            $sql_run = mysqli_query($con , $sql);

            if ($sql_run) {
                move_uploaded_file($_FILES['front_image']['tmp_name'], './seasonal_placement_images/' . $front_image);
                move_uploaded_file($_FILES['back_image']['tmp_name'], './seasonal_placement_images/' . $back_image);
                $_SESSION['digi_meg'] = "Added";
                header('Location:./seasonal_placement.php');
            } else {
                $_SESSION['digi_meg'] = "Failed";
                header('Location:./seasonal_placement.php');
            }
        }
    }
}
