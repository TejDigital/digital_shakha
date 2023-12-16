<?php
session_start();
require('./config/dbcon.php');

$id = $_POST['id'];
$course = $_POST['course'];
$find = $_POST['find'];
$referral_code = $_POST['referral_code'];
$duration = $_POST['duration'];

$sql = "UPDATE application_tbl SET course='$course',know_about_as='$find',referral_code='$referral_code',duration = '$duration' WHERE id ='$id'";
$sql_run  = mysqli_query($con, $sql);

if ($sql_run) {
    echo json_encode(array('success' => 3, 'data' => $id));
} else {
    echo json_encode(30);
}
?>
