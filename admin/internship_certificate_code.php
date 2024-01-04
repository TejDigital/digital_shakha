<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {

    $name = mysqli_real_escape_string($con, $_POST['std_name']);
    $file = $_FILES['file']['name'];

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

            if ($_FILES['file']['size'] > 15000000) {
                $_SESSION['digi_meg'] = "File is too big";
                header('Location: ./internship_certificate.php');
                exit();
            }

            $file_ext_need = ['pdf', 'doc', 'docx', 'png', 'jpg', 'jpeg'];
            $file_ext = pathinfo($file, PATHINFO_EXTENSION);

            if (!in_array($file_ext, $file_ext_need)) {
                $_SESSION['digi_meg'] = "File must have pdf, doc, or docx extension";
                header('Location: ./internship_certificate.php');
                exit();
            }

            $sql = "INSERT INTO internship_certificate_tbl(app_id,file,program) VALUES (?,?,?)";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "isi", $name, $file,$program_id);
            mysqli_stmt_execute($stmt);

            if ($stmt) {
                move_uploaded_file($_FILES['file']['tmp_name'], './certificate_files/' . $file);
                $_SESSION['digi_meg'] = "certificate added";
                header('Location: ./internship_certificate.php');
            } else {
                $_SESSION['digi_meg'] = "Failed to add certificate: " . mysqli_error($con);
                header('Location: ./internship_certificate.php');
            }
        }
    }
}
