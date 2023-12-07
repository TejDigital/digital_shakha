<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['app_update'])) {
    $id = $_POST['id'];
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
    $payment_status = $_POST['payment_status'];
    $referral_code = $_POST['referral_code'];
    $photo = $_FILES['photo']['name'];
    $payment_ss = $_FILES['payment_ss']['name'];

    $old_photo = $_POST['old_photo'];
    $old_payment_ss = $_POST['old_payment_ss'];

    $update_photo = $old_photo;
    if (!empty($photo) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $update_photo = $photo;
        move_uploaded_file($_FILES['photo']['tmp_name'], './student_application_photo/' . $photo);
        unlink("./student_application_photo/" . $old_photo); // Remove the old photo
    }

    // Handle payment_ss upload
    $update_payment_ss = $old_payment_ss;
    if (!empty($payment_ss) && $_FILES['payment_ss']['error'] == UPLOAD_ERR_OK) {
        $update_payment_ss = $payment_ss;
        move_uploaded_file($_FILES['payment_ss']['tmp_name'], './student_application_payment_ss/' . $payment_ss);
        unlink("./student_application_payment_ss/" . $old_payment_ss); // Remove the old payment_ss
    }
    $sql = "UPDATE application_tbl SET name='$first_name',last_name='$last_name',gender='$gender',dob='$dob',phone='$phone',email='$email',address_1='$address1',address_2='$address2',pin_code='$pin_code',city='$city',state='$state',country='$country',collage='$college',degree='$degree',course='$course',know_about_as='$find',referral_code='$referral_code',profile_photo='$update_photo',payment_photo='$update_payment_ss',payment_status='$payment_status' WHERE id ='$id'";

    $sql_run = mysqli_query($con, $sql);

    if ($sql_run) {
        $_SESSION['digi_meg'] = "Update done";
        header('Location:./application.php');
    } else {
        $_SESSION['digi_meg'] = "Failed";
        header('Location:./application.php');
    }
}
