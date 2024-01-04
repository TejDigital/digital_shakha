<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $name = mysqli_real_escape_string($con, $_POST['std_name']);
    $old_file = mysqli_real_escape_string($con, $_POST['old_file']);
    $new_file = $_FILES['new_file']['name'];

    $sql = "SELECT * FROM application_tbl where id = '$name'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run)) {
        $row = mysqli_fetch_assoc($sql_run);
        $course = $row['course'];
        $sql2 = "SELECT * FROM program_tbl where program_id = '$course'";
        $sql_run2 = mysqli_query($con, $sql2);
        if (mysqli_num_rows($sql_run2) > 0) {
            $program = mysqli_fetch_assoc($sql_run2);
            $program_id = $program['program_id'];


            if ($_FILES['new_file']["size"] > 15000000) {
                $_SESSION['digi_meg'] = "File size is too big";
                header('Location: ./internship_track_course_material_edit.php?id=' . $id . '');
                exit();
            }

            $updated_file = $old_file;
            if (!empty($new_file)) {
                $updated_file = $new_file;
                move_uploaded_file($_FILES['new_file']['tmp_name'], './certificate_files/' . $new_file);
                unlink("./certificate_files/" . $old_file);
            }

            $sql = "UPDATE internship_certificate_tbl SET app_id=?,file=? ,certificate_status= ? ,program = ? WHERE certificate_id  = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "isiii", $name, $updated_file, $status, $program_id, $id);
            mysqli_stmt_execute($stmt);


            if ($stmt) {
                $_SESSION['digi_meg'] = "certificate Updated";
                header('Location: ./internship_certificate.php');
            } else {
                $_SESSION['digi_meg'] = "Error updating certificate: " . mysqli_error($con);
                header('Location: ./internship_certificate.php');
            }
        }
    }
}
