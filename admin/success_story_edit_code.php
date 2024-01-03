<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);

    $description = $_POST['description'];
    $description = str_replace("'", "\'", $description);

    $tips = $_POST['tips'];
    $tips = str_replace("'", "\'", $tips);

    $old_image = mysqli_real_escape_string($con, $_POST['old_image']);
    $new_image = $_FILES['new_image']['name'];


  

    // if ($new_image != '') {
        if ($_FILES['new_image']["size"] > 7000000) {
            $_SESSION['digi_meg'] = "File size is too big";
            header('Location: ./success_story_edit.php?id='.$id.'');
            exit();
        }

        $img_ext = ['png', 'jpg', 'jpeg'];
        $file_ext = pathinfo($new_image, PATHINFO_EXTENSION);

        if (!in_array($file_ext, $img_ext)) {
            $_SESSION['digi_meg'] = "file only in jpg , png or jpeg ext";
            header('Location: ./success_story_edit.php?id='.$id.'');
            exit();
        }

        // if (!empty($new_image)) {
        //     $updated_image = $new_image;
        //     move_uploaded_file($_FILES['new_image']['tmp_name'], './success_story_images/' . $new_image);
        //     unlink("./success_story_images/" . $old_image);
        // } else {
        //     $updated_image = $old_image;
        // }

        $updated_image = $old_image;
        if (!empty($new_image) && $_FILES['new_image']['error'] == UPLOAD_ERR_OK) {
            $updated_image = $new_image;
            move_uploaded_file($_FILES['new_image']['tmp_name'], './success_story_images/' . $new_image);
            unlink("./success_story_images/" . $old_image);
        }

        $sql = "UPDATE success_story_tbl SET name=?,image=?,description=?,status=? ,designation=? ,tips=? WHERE story_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssissi", $name,$updated_image, $description,$status,$designation,$tips,$id);
        mysqli_stmt_execute($stmt);
    // } 
    // else {
      
    //     $sql = "UPDATE success_story_tbl SET name=?,description=?,status=? ,designation=? ,tips=? WHERE story_id = ?";
    //     $stmt = mysqli_prepare($con, $sql);
    //     mysqli_stmt_bind_param($stmt, "ssissi", $name,$description,$status,$designation,$tips,$id);
    //     mysqli_stmt_execute($stmt);
    // }

    if ($stmt) {
        $_SESSION['digi_meg'] = "Story Updated";
        header('Location: ./success_story.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating event: " . mysqli_error($con);
        header('Location: ./success_story.php');
    }
}
?>
