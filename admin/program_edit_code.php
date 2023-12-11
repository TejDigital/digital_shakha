<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $detail = $_POST['detail'];
    $type_class = $_POST['type_class'];
    $next_batch = $_POST['next_batch'];
    $enroll_count = $_POST['enroll_count'];
    $rating_no = $_POST['rating_no'];
    $reviews = $_POST['reviews'];
    $experience_level = $_POST['experience_level'];
    $experience_text = $_POST['experience_text'];
    $program_duration = $_POST['program_duration'];
    $view_description = $_POST['view_description'];
    $view_description = str_replace("'", "\'", $view_description);

    $new_img = $_FILES['new_img']['name'];
    $old_img = $_POST['old_img'];

    $new_img2 = $_FILES['new_img2']['name'];
    $old_img2 = $_POST['old_img2'];

    $update_img = $old_img;
    if (!empty($new_img) && $_FILES['new_img']['error'] == UPLOAD_ERR_OK) {
        $update_img = $new_img;
        move_uploaded_file($_FILES['new_img']['tmp_name'], './program_images/' . $new_img);
        unlink("./program_images/" . $old_img);
    }

    $update_img2 = $old_img2;
    if (!empty($new_img2) && $_FILES['new_img2']['error'] == UPLOAD_ERR_OK) {
        $update_img2 = $new_img2;
        move_uploaded_file($_FILES['new_img2']['tmp_name'], './program_images/' . $new_img2);
        unlink("./program_images/" . $old_img2);
    }

    $sql =  "UPDATE program_tbl SET program_name='$name',program_detail='$detail',program_image='$update_img',program_image2='$update_img2',program_view_description='$view_description',program_type_class='$type_class',program_next_batch='$next_batch',program_enroll_count='$enroll_count',program_rating_no='$rating_no',program_review_no='$reviews',program_experience='$experience_level',program_experience_text='$experience_text',program_duration='$program_duration',program_status='$status' WHERE program_id = '$id'";

    $sql_run = mysqli_query($con, $sql);

    if ($sql_run) {
        $_SESSION['digi_meg'] = "Update done";
        header('Location:./programs.php');
    } else {
        $_SESSION['digi_meg'] = "Failed";
        header('Location:./programs.php');
    }
}
