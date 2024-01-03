<?php
session_start();
require('config/dbcon.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


$email = mysqli_real_escape_string($con,  $_POST['forget_email']);
$token = md5(rand());
$resend = "SELECT * FROM users WHERE email = '$email'";
$resend_query = mysqli_query($con, $resend);

if (mysqli_num_rows($resend_query) > 0) {
  $row = mysqli_fetch_assoc($resend_query);
  $name = $row['name'];
  $get_email = $row['email'];

  $update_token = "UPDATE users SET verification_token ='$token' WHERE email='$get_email' limit 1";
  $update_token_query = mysqli_query($con, $update_token);

  if ($update_token_query) {
    // send_reset_pass($name, $get_email, $token);
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
      $mail->addAddress($get_email, $name);     //Add a recipient

      //Content
      $mail->Subject = 'Application Received - Confirmation';
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
                    // <img src='./digital_logo.png'>
                     </div>
                     <br>
                     <br>
                    <div class='text_box'>
                        <h2>To reset your Digitalshakha password, click:</h2>
                        <p> <a href='https://learn.digitalshakha.in/reset_password.php?token=" . $token . '&email=' . $get_email . "'>click</a> </p>
      
                        <ul>
                            <li style='margin-bottom: .5rem;'>
                                <h3>Detail:</h3>
                            </li>
                            <li><span>Name</span>:" . $name . "</li>
                            <li><span>Email</span>: " . $get_email . "</li>
                        </ul>
      
                        <p>Stay Connected, Stay Empowered!</p>
          
                        <p>Thank you for being a part of the DigitalShakha journey. We look forward to keeping you informed and inspired!</p>
                    </div>
                </section>
                <section class='email_2'>
                    <div class='social_links'>
                        <h3>Follow Digitalshakha on:</h3>
                        <div class='links'>
                            <a href='https://www.instagram.com/digitalshakha_?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA=='><img src='../assets/images/Instagram.svg' alt=''></a>
                            <a href='https://www.behance.net/digitalshakha_/info'><img src='../assets/images/Behance.svg' alt=''></a>
                            <a href='https://www.facebook.com/profile.php?id=100064241974920&mibextid=ZbWKwL'><img src='../assets/images/Facebook.svg' alt=''></a>
                            <a href='https://youtube.com/@digitalshakha5699?si=h06mPphwyqYWt1mY'><img src='../assets/images/YouTube.svg' alt=''></a>
                            <a href='https://www.linkedin.com/company/digitalshakha/'><img src='../assets/images/LinkedIn_link.svg' alt=''></a>
                            <a href='https://in.pinterest.com/digitalshakha_/'><img src='../assets/images/Pinterest.svg' alt=''></a>
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
        </html>";
      // <p> <a href='http://localhost/digital_shakha/reset_password.php?token=" . $token . '&email=' . $get_email . "'>click</a> </p>
      // <p> <a href='https://learn.digitalshakha.in/reset_password.php?token=" . $token . '&email=' . $get_email . "'>click</a> </p>
      // <p> <a href='https://digitalshakha.com/internship/reset_password.php?token=" . $token . '&email=' . $get_email . "'>click</a> </p>

      $mail->send();

      echo json_encode(array("forget_msg" => 2)); //Check your email for reset password

      exit(0);
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  } else {
    echo json_encode(array("forget_msg" => 3)); //Something went wrong
  }
} else {
  echo json_encode(array("forget_msg" => 4)); //Email not found
}
