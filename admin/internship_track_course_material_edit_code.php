<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $material_name = mysqli_real_escape_string($con, $_POST['material_name']);
    $old_file = mysqli_real_escape_string($con, $_POST['old_file']);
    $new_file = $_FILES['new_file']['name'];


        if ($_FILES['new_file']["size"] > 15000000) {
            $_SESSION['digi_meg'] = "File size is too big";
            header('Location: ./internship_track_course_material_edit.php?id='.$id.'');
            exit();
        }

        // $file_ext_need = ['pdf', 'doc', 'docx','png','jpg','jpeg'];
        // $file_ext = pathinfo($file, PATHINFO_EXTENSION);

        // if (!in_array($file_ext, $file_ext_need)) {
        //     $_SESSION['digi_meg'] = "File must have pdf, doc, or docx extension";
        //     header('Location: ./internship_track_course_material_edit.php?id='.$id.'');
        //     exit();
        // }

        $updated_file = $old_file;
        if (!empty($new_file)) {
            $updated_file = $new_file;
            move_uploaded_file($_FILES['new_file']['tmp_name'], './course_material_files/' . $new_file);
            unlink("./course_material_files/" . $old_file);
        }

        $sql = "UPDATE internship_course_material_tbl SET program=?,material=? ,material_status= ? ,material_name = ? WHERE course_material_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "isisi", $name, $updated_file, $status, $material_name,$id);
        mysqli_stmt_execute($stmt);
    

    if ($stmt) {
        $_SESSION['digi_meg'] = "Material Updated";
        header('Location: ./internship_track_course_material.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating material: " . mysqli_error($con);
        header('Location: ./internship_track_course_material.php');
    }
}
?>
