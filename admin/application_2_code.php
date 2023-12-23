<?php
session_start();
require('./config/dbcon.php');

$id = $_POST['id'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$pin_code = $_POST['pin_code'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$college = $_POST['college'];
$degree = $_POST['degree'];

$query = "SELECT email FROM application_tbl WHERE email = '$email'";
$query_run = mysqli_query($con, $query);
if (mysqli_num_rows($query_run) > 0) {
    $msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert' id='success-alert2'>
    <p><strong>Hey !</strong> Email already registered Please Try another</p>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    echo json_encode(array("success" => 22 , "msg" => $msg));
} else {

    $sql = "UPDATE application_tbl SET phone='$phone',email='$email',address_1='$address1',address_2='$address2',pin_code='$pin_code',city='$city',state='$state',country='$country',collage='$college',degree='$degree' WHERE id ='$id'";

    $sql_run  = mysqli_query($con, $sql);

    if ($sql_run) {
        echo json_encode(array('success' => 2, 'data' => $id));
    } else {
        echo json_encode(20);
    }
}
