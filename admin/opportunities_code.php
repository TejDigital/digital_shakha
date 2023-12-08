<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $description = str_replace("'","\'",$description);

    $sql = "INSERT INTO opportunities_tbl(opp_name,opp_description) VALUES (?,?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss",$name,$description);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "opportunity Added";
        header('Location: ./opportunities.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add event: " . mysqli_error($con);
        header('Location: ./opportunities.php');
    }
}
?>
