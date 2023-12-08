<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $description = str_replace("'","\'",$description);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    
    
        $sql = "UPDATE opportunities_tbl SET opp_name=?,opp_description =? ,opp_status =? WHERE opp_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssii", $name,$description,$status,$id);
        mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "Opportunity Updated";
        header('Location: ./opportunities.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating event: " . mysqli_error($con);
        header('Location: ./opportunities.php');
    }
}
?>
