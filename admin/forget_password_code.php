<?php
session_start();
require('config/dbcon.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

function send_reset_pass($name, $get_email, $token)
{
  $mail = new PHPMailer(true);
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
  $mail->SMTPDebug = 0;                      
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com'; 
  $mail->Port = 587;  
  $mail->SMTPAuth = true;
  $mail->Username = 'tejpratap.digitalshakha@gmail.com';  
  $mail->Password = 'ckytndyqptfopcns'; 
  $mail->SMTPSecure = 'tls';  

  $mail->setFrom('tejpratap.digitalshakha@gmail.com', 'Mailer');
  $mail->addAddress($get_email, $name);     

  $mail->isHTML(true);                                  
  $mail->Subject = 'resend - Password verification from the king';
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
          <h1>New query from the <span> KING </span></h1>
          <p><strong>Name:</strong> ' . $name . '</p>
          <p><strong>Email:</strong> ' . $get_email . '</p>
          <p><strong>Message:</strong></p>
          <p> <a href="http://localhost/digital_shakha/reset_password.php?token=' . $token . '&email=' . $get_email . '">click</a> </p>
          </body>
          </html>';
          // <p> <a href="http://localhost/digital_shakha/reset_password.php?token=' . $token . '&email=' . $get_email . '">click</a> </p>
          // <p> <a href="https://digitalshakha.com/internship/reset_password.php?token=' . $token . '&email=' . $get_email . '">click</a> </p>
          
  $mail->send();
}

if (isset($_POST['forget_email'])) {


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
      send_reset_pass($name, $get_email, $token);
      // $_SESSION['message'] = "Check your email for reset password";
      // header('Location:../index.php');
      echo json_encode(array("forget_msg" => 2)); //Check your email for reset password
    } else {
      $_SESSION['message'] = "Something went wrong";
      header('location:../index.php');
      // echo "Something went wrong";
    }
  } else {
    $_SESSION['message'] = "Email not found";
    header('location:../index.php');
    // echo "Email not found";
  }
}


if (isset($_POST['new_forget_email'])) {
  $email = mysqli_real_escape_string($con, $_POST['new_forget_email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $confirm_password =  mysqli_real_escape_string($con, $_POST['confirm_password']);
  $token = mysqli_real_escape_string($con, $_POST['token']);

  $check = "SELECT verification_token from users where  verification_token = '$token' limit 1";
  $check_query = mysqli_query($con, $check);

  if (mysqli_num_rows($check_query) > 0) {
    if ($password == $confirm_password) {
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $update_pass = "UPDATE users SET password ='$hashed_password' WHERE verification_token='$token' limit 1";
      $update_pass_query = mysqli_query($con, $update_pass);

      if ($update_pass_query) {
        // $_SESSION['message'] = "New Password Updated";
        // header('location:../index.php');
        echo json_encode(array("reset_msg" => 2));//New Password Updated
  
      } else {
        // $_SESSION['message'] = "Something went wrong";
        echo json_encode(array("reset_msg" => 3 , "token" => $token , "email" => $email));//Something went wrong
        // header('location:../setPassword.php?token=' . $token . '&email=' . $email . '');
      }
    } else {
      // $_SESSION['message'] = "Password not match";
      echo json_encode(array("reset_msg" => 4 , "token" => $token , "email" => $email));//Password not match
      // header('location:../setPassword.php?token=' . $token . '&email=' . $email . '');
    }
  } else {
    // $_SESSION['message'] = "Invalid token";
    echo json_encode(array("reset_msg" => 5 , "token" => $token , "email" => $email));//Invalid token
    // header('location:../setPassword.php?token=' . $token . '&email=' . $email . '');
  }
}
