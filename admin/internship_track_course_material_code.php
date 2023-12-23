<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $material_name = mysqli_real_escape_string($con, $_POST['material_name']);
    $file = $_FILES['file']['name'];

    if ($_FILES['file']['size'] > 15000000) {
        $_SESSION['digi_meg'] = "File is too big";
        header('Location: ./internship_track_course_material.php');
        exit();
    }

    $file_ext_need = ['pdf', 'doc', 'docx','png','jpg','jpeg'];
    $file_ext = pathinfo($file, PATHINFO_EXTENSION);

    if (!in_array($file_ext, $file_ext_need)) {
        $_SESSION['digi_meg'] = "File must have pdf, doc, or docx extension";
        header('Location: ./internship_track_course_material.php');
        exit();
    }

    $sql = "INSERT INTO internship_course_material_tbl(program,material,material_name) VALUES (?, ? ,?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "iss", $name, $file,$material_name);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        move_uploaded_file($_FILES['file']['tmp_name'], './course_material_files/' . $file);
        $_SESSION['digi_meg'] = "Course Material added";
        header('Location: ./internship_track_course_material.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add Material: " . mysqli_error($con);
        header('Location: ./internship_track_course_material.php');
    }
}
?>
