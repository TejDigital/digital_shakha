<?php
require('./config/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$actual_link = 'http://'.$_SERVER['HTTP_HOST'];


$unique_id = $_POST['unique_id'];
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$position = $_POST['position'];
$message = $_POST['message'];

$check_unique_code2 = "SELECT * FROM unique_code_tbl WHERE unique_code = '$unique_id'";
$check_unique_code_run2 = mysqli_query($con, $check_unique_code2);
if (mysqli_num_rows($check_unique_code_run2) > 0) {

$sql = "INSERT INTO schedule_interview_tbl(unique_id, name, email, phone, date, time, position, message) VALUES ('$unique_id','$name','$email','$phone','$date','$time','$position','$message')";

$sql_run = mysqli_query($con, $sql);

if ($sql) {

    try {
        $mail = new PHPMailer();
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->isHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'tejpratap.digitalshakha@gmail.com';
        $mail->Password = 'ckytndyqptfopcns';
        $mail->SMTPSecure = 'tls';

        //Recipients
        $mail->setFrom('tejpratap.digitalshakha@gmail.com', 'Digitalshakha');
        $mail->addAddress($email, $name);     //Add a recipient
        // $mail->addAttachment('./digital_logo.png');


        // // Embed an image
        // $imagePath = 'digital_logo.png'; // Replace with the actual path to your image
        // $imageCID = 'unique-cid'; // Unique Content-ID for the image
        // $mail->addEmbeddedImage($imagePath, $imageCID);


        //Content
        $mail->Subject = 'Interview Schedule Confirmation';
        $mail->Body = "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Digitalshakha</title>
            <style>
                * {
                    padding: 0;
                    margin: 0;
                    box-sizing: border-box;
                    font-family: Arial, Helvetica, sans-serif;
                }
        
                .email_1 {
                    padding: 2rem;
                }
        
                .email_1 .img {
                    width: 300px;
                    margin-bottom: 1rem;
                }
        
                .email_1 .img img {
                    width: 100%;
                    width: 100%;
                }
        
                .email_1 .text_box {
                    border: 1px solid #BB5327;
                    padding: 2rem;
                    text-align: left;
                }
        
                .email_1 .text_box ul {
                    list-style: none;
                    text-align: left;
                    margin: 2rem 0;
                    /* padding-left: 2rem; */
                }
        
                .email_1 .text_box ul li {
                    list-style: none;
                }
        
                .email_1 .text_box p {
                    font-size: 1rem;
                    font-weight: 500;
                    line-height: 22px;
                    /* text-align: center; */
                    margin-bottom: 1rem;
                }
                .email_1 .text_box h2 {
                    font-size: 1.3rem;
                    font-weight: 600;
                    line-height: 30px;
                    margin-bottom:2rem;
                }
                .email_1 .text_box h3 {
                    font-size: 1.2rem;
                    font-weight: 600;
                    line-height: 22px;
                }
        
                .email_2 {
                    padding: 1rem;
                    background-color: #BB532733;
                }
        
                .email_2 .social_links {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
        
                .email_2 .social_links h1 {
                    font-size: 1.4rem;
                    font-weight: 400;
                    line-height: 30px;
                    color: #5C2109;
                }
        
                .email_2 .social_links .links {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 0 1rem;
                }
        
                .email_2 .social_links .links a {
                    text-decoration: none;
                }
        
                .email_2 .social_links .links a img {
                    width: 30px;
                }
        
                .email_3 {
                    padding: 2rem;
                    background-color: #1A0E09;
                    color: #FFFFFF;
                    text-align: center;
                }
        
                .email_3 .footer .text1 {
                    padding: 2rem;
                }
        
                .email_3 .footer .text1 p {
                    font-size: 1rem;
                    font-weight: 600;
                    line-height: 24px;
                }
        
                .email_3 .footer .text1 p a {
                    color: #FFFFFF;
                    text-decoration: none;
                }
        
                .email_3 .footer .end_text p {
                    font-size: 1rem;
                    font-weight: 600;
                    line-height: 24px;
                }
        
                .email_3 .footer .end_text p a {
                    color: #FFFFFF;
                    text-decoration: none;
                }
        
                @media(max-width:500px) {
                    .email_2 .social_links {
                        display: flex;
                        flex-direction: column;
                        gap: 1rem;
                    }
        
                    .email_1 .img {
                        width: 200px;
                        margin-bottom: 1rem;
                    }
                }
            </style>
        </head>
        
        <body>
            <div class='#mailBody'>
                <section class='email_1'>
                    <div class='img'>
                    <img src='".$actual_link."/admin/email_images/digital_logo.png' >

                     </div>
                     <br>
                     <br>
                    <div class='text_box'>
                        <h2>Congratulations on reaching the interview scheduling stage! We appreciate your interest in joining our team. To ensure a smooth process, please review and confirm the details below for your upcoming interview:</h2>
                        <ul>
                        <li><span>Interview Date:</span>:" . $date . "</li>
                        <li><span>Interview Time:</span>: " . $time . "</li>
                    </ul>

                        <ul>
                        <li style='margin-bottom: .5rem;'>
                            <h3>Personal Information:</h3>
                        </li>
                        <li><span>Name</span>:" . $name . "</li>
                        <li><span>Number</span>: " . $phone . "</li>
                        <li><span>Email</span>: " . $email . "</li>
                    </ul>
                      
                        <p>Please be punctual and ensure that you are well-prepared for the interview. We look forward to getting to know you better and exploring your potential contributions to our team.
                        </p>
        
                        <p>Thank you for choosing DigitalShakha</p>
                    </div>
                </section>
                <section class='email_2'>
                    <div class='social_links'>
                        <h3>Follow Digitalshakha on:</h3>
                        <div class='links'>
                            <a href='https://www.instagram.com/digitalshakha_?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA=='><img src='".$actual_link."/admin/email_images/Instagram.svg' alt=''></a>
                            <a href='https://www.behance.net/digitalshakha_/info'><img src='".$actual_link."/admin/email_images/Behance.svg' alt=''></a>
                            <a href='https://www.facebook.com/profile.php?id=100064241974920&mibextid=ZbWKwL'><img src='".$actual_link."/admin/email_images/Facebook.svg' alt=''></a>
                            <a href='https://youtube.com/@digitalshakha5699?si=h06mPphwyqYWt1mY'><img src='".$actual_link."/admin/email_images/YouTube.svg' alt=''></a>
                            <a href='https://www.linkedin.com/company/digitalshakha/'><img src='".$actual_link."/admin/email_images/LinkedIn_link.svg' alt=''></a>
                            <a href='https://in.pinterest.com/digitalshakha_/'><img src='".$actual_link."/admin/email_images/Pinterest.svg' alt=''></a>
                        </div>
                    </div>
                </section>
                <section class='email_3'>
                    <div class='footer'>
                        <div class='text1'>
                            <p><a href='#!'>Unsubscribe</a> or manage preferences</p>
                        </div>
                        <div class='end_text'>
                            <p> © 2023 <a href='https://www.digitalshakha.in'>Digitalshakha</a>, All Rights Reserved | PLOT - 490-B, cross, Street 25, main road, Smriti Nagar, Bhilai, Chhattisgarh 490020</p>
                        </div>
                    </div>
                </section>
            </div>
        </body>
        </html>
        ";
        $mail->send();
        echo json_encode(array("alert" => 1)); //we are connect soon
        exit(0);
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo json_encode(array("alert" => 2)); //Something went wrong
}
}else{
    echo json_encode(array("alert" => 3)); //code not found
}