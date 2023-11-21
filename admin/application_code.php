<?php
session_start();
require('./config/dbcon.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$pin_code = $_POST['pin_code'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$college = $_POST['college'];
$degree = $_POST['degree'];
$course = $_POST['course'];
$find = $_POST['find'];
$referral_code = $_POST['referral_code'];
$photo = $_FILES['photo']['name'];
$payment_ss = $_FILES['payment_ss']['name'];


$sql = "INSERT INTO application_tbl(name, last_name, gender, dob, phone, email, address_1, address_2, pin_code, city, state, country, collage, degree, course, know_about_as, referral_code, profile_photo, payment_photo) VALUES ('$first_name','$last_name','$gender','$dob','$phone','$email','$address1','$address2','$pin_code','$city','$state','$country','$college','$degree','$course','$find','$referral_code','$photo','$payment_ss')";
// echo $sql ;
// die();
$sql_run  = mysqli_query($con, $sql);

if ($sql_run) {
    move_uploaded_file($_FILES['photo']['tmp_name'], './student_application_photo/' . $photo);
    move_uploaded_file($_FILES['payment_ss']['tmp_name'], './student_application_payment_ss/' . $payment_ss);
    echo "We are connect soon";
} else {
    echo "Something went wrong";
}
?>
