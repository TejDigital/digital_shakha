<?php
require('config/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


$username = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$reenter_pass = $_POST['confirm_password'];
$token = md5(rand());

if ($password == $reenter_pass) {
  $sql = "INSERT INTO users (name,email,phone,password,verification_token) values('$username','$email','$phone','$password','$token')";
  $sql_run = mysqli_query($con, $sql);

  if ($sql_run) {
    $select = "SELECT * FROM users WHERE verification_token = '$token'";
    $select_query = mysqli_query($con, $select);
    if (mysqli_num_rows($select_query) > 0) {
      foreach ($select_query as $row) {
        $name = $row['name'];
        $number = $row['phone'];
        $usermail = $row['email'];
        $v_token = $row['verification_token'];

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
          $mail->addAddress($usermail, $name);     //Add a recipient

          //Content
          $mail->Subject = 'Verification email for new registration at Digitalshakha';
          $mail->Body = '<html>
            <head>
              <style>
                body {
                  font-family: Arial, sans-serif;
                  background-color: #f1f1f1;
                }
                h1 {
                  color: #333;
                }
                h1 span{
                  color:#000000;
                }
                p {
                  color: #555;
                } 
              </style>
            </head>
            <body>
              <p><strong>Name:</strong> ' . $name . '</p>
              <p><strong>Phone:</strong> ' . $number . '</p>
              <p><strong>Email:</strong> ' . $usermail . '</p>
              <p><strong>Message:</strong></p>
              <p> <a href="http://localhost/digital_shakha/admin/verify_token.php?token=' . $v_token . '">click here to verify</a> </p>
            </body>
          </html>';

          $mail->send();
          echo 'email has been sent to your email id';
          exit(0);
        } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      }
    }
  } else {
    echo "Something went wrong , please try after some time";
  }
} else {
  echo "Password and confirm password not match";
}
