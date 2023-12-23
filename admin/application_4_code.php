<?php
session_start();
require('./config/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


$id = $_POST['id'];
$transaction_code = $_POST['transaction_code'];
$payment_ss = $_FILES['payment_ss']['name'];

$sql = "UPDATE application_tbl SET transaction_id = '$transaction_code' ,payment_photo='$payment_ss' WHERE id ='$id'";
$sql_run  = mysqli_query($con, $sql);

if ($sql_run) {
    move_uploaded_file($_FILES['payment_ss']['tmp_name'], './student_application_payment_ss/' . $payment_ss);

    $select = "SELECT * FROM application_tbl WHERE id = '$id'";
    $select_query = mysqli_query($con, $select);
    if (mysqli_num_rows($select_query) > 0) {
      foreach ($select_query as $row) {
        $name = $row['name'];
        $last_name = $row['last_name'];
        $userEmail = $row['email'];
        $course = $row['course'];
        $program_query = "SELECT * FROM program_tbl WHERE program_id = '$course'";
        $program_query_run = mysqli_query($con, $program_query);
        if(mysqli_num_rows($program_query_run) > 0){
            $program = mysqli_fetch_assoc($program_query_run);
            $program_name = $program['program_name'];
        }
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
          $mail->addAddress($userEmail, $name);     //Add a recipient

          //Content
          $mail->Subject = 'Your Registration at  Digitalshakha is completed';
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
            <p><strong>Name:</strong> ' . $name .' '. $last_name.'</p>
            <p><strong>Email:</strong> ' . $userEmail . '</p>
            <p><strong>Course:</strong> ' . $program_name . '</p>
            </body>
            </html>';

          $mail->send();

          echo json_encode(array('success' => 4, 'data' => $id));

          exit(0);
        } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      }
    }else{
        echo "error";
        }
} else {
    echo json_encode(40);
}
?>
