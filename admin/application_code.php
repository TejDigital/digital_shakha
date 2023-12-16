<?php
session_start();
require('./config/dbcon.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
// $phone = $_POST['phone'];
// $email = $_POST['email'];
// $address1 = $_POST['address1'];
// $address2 = $_POST['address2'];
// $pin_code = $_POST['pin_code'];
// $city = $_POST['city'];
// $state = $_POST['state'];
// $country = $_POST['country'];
// $college = $_POST['college'];
// $degree = $_POST['degree'];
// $course = $_POST['course'];
// $find = $_POST['find'];
// $referral_code = $_POST['referral_code'];
$photo = $_FILES['photo']['name'];
// $payment_ss = $_FILES['payment_ss']['name'];


// $sql = "INSERT INTO application_tbl(name, last_name, gender, dob, phone, email, address_1, address_2, pin_code, city, state, country, collage, degree, course, know_about_as, referral_code, profile_photo, payment_photo) VALUES ('$first_name','$last_name','$gender','$dob','$phone','$email','$address1','$address2','$pin_code','$city','$state','$country','$college','$degree','$course','$find','$referral_code','$photo','$payment_ss')";
$sql = "INSERT INTO application_tbl(name, last_name, gender, dob, profile_photo) VALUES ('$first_name','$last_name','$gender','$dob','$photo')";
// echo $sql ;
// die();
$sql_run  = mysqli_query($con, $sql);

if ($sql_run) {
    move_uploaded_file($_FILES['photo']['tmp_name'], './student_application_photo/' . $photo);
    // move_uploaded_file($_FILES['payment_ss']['tmp_name'], './student_application_payment_ss/' . $payment_ss);
    // echo "We are connect soon";
    $query = "SELECT * FROM application_tbl WHERE name = '$first_name'";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) > 0){
        $data = mysqli_fetch_assoc($query_run);
        $id = $data['id'];
        echo json_encode(array('success' => 1, 'data' => $id));
    }
} else {
    echo json_encode(10);

}
?>
