<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $image = $_FILES['image']['name'];

    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['digi_meg'] = "File is too big";
        header('location:./programs.php');
    } else {
        $img_ext = ['png', 'jpg', 'jpeg'];

        $file_ext = pathinfo($image, PATHINFO_EXTENSION);
        if (!in_array($file_ext, $img_ext)) {
            $_SESSION['digi_meg'] = "file only in jpg ,png or jpeg ext";
            header('location:./programs.php');
        }else{
            $sql = "INSERT INTO program_tbl(program_name,program_detail,program_image)VALUES('$name','$detail','$image')";
            $sql_run = mysqli_query($con , $sql);

            if ($sql_run) {
                move_uploaded_file($_FILES['image']['tmp_name'], './program_images/' . $image);
                $_SESSION['digi_meg'] = "Program Added";
                header('Location:./programs.php');
            } else {
                $_SESSION['digi_meg'] = "Failed";
                header('Location:./programs.php');
            }
        }
    }
}
