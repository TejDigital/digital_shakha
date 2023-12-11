<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $image = $_FILES['image']['name'];
    $image2 = $_FILES['image2']['name'];
    $type_class = $_POST['type_class'];
    $next_batch = $_POST['next_batch'];
    $enroll_count = $_POST['enroll_count'];
    $rating_no = $_POST['rating_no'];
    $reviews = $_POST['reviews'];
    $experience_level = $_POST['experience_level'];
    $experience_text = $_POST['experience_text'];
    $program_duration = $_POST['program_duration'];
    $view_description = $_POST['view_description'];
    $view_description = str_replace("'","\'" , $view_description);

    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['digi_meg'] = "File is too big";
        header('location:./programs.php');
    }
    //  else {
    //     $img_ext = ['png', 'jpg', 'jpeg'];
    //     $file_ext = pathinfo($image, PATHINFO_EXTENSION);

    //     if (!in_array($file_ext, $img_ext)) {
    //         $_SESSION['digi_meg'] = "file only in jpg ,png or jpeg ext";
    //         header('location:./programs.php');
    //     }
        else{
            // $sql = "INSERT INTO program_tbl(program_name,program_detail,program_image)VALUES('$name','$detail','$image')";
            $sql = "INSERT INTO program_tbl(program_name, program_detail, program_image, program_image2, program_view_description, program_type_class, program_next_batch, program_enroll_count, program_rating_no, program_review_no, program_experience, program_experience_text, program_duration) VALUES ('$name','$detail','$image','$image2','$view_description','$type_class','$next_batch','$enroll_count','$rating_no','$reviews','$experience_level','$experience_text','$program_duration')";
            $sql_run = mysqli_query($con , $sql);

            if ($sql_run) {
                move_uploaded_file($_FILES['image']['tmp_name'], './program_images/' . $image);
                move_uploaded_file($_FILES['image2']['tmp_name'], './program_images/' . $image2);
                $_SESSION['digi_meg'] = "Program Added";
                header('Location:./programs.php');
            } else {
                $_SESSION['digi_meg'] = "Failed";
                header('Location:./programs.php');
            }
        }
    // }
}
