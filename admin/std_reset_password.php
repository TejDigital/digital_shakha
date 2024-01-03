<?php
// ------------------------------reset-password-code------------------

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
  
  
?>