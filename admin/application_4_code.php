<?php
session_start();
require('./config/dbcon.php');

$id = $_POST['id'];
$transaction_code = $_POST['transaction_code'];
$payment_ss = $_FILES['payment_ss']['name'];

$sql = "UPDATE application_tbl SET transaction_id = '$transaction_code' ,payment_photo='$payment_ss' WHERE id ='$id'";
$sql_run  = mysqli_query($con, $sql);

if ($sql_run) {
    move_uploaded_file($_FILES['payment_ss']['tmp_name'], './student_application_payment_ss/' . $payment_ss);
    echo json_encode(array('success' => 4, 'data' => $id));
} else {
    echo json_encode(40);
}
?>
