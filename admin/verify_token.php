<?php
session_start();
require('config/dbcon.php');

if (isset($_GET['token'])) {
    $token_id = $_GET['token'];
    $token_verify = "SELECT verification_token , verification_status from users WHERE verification_token = '$token_id' limit 1";
    $token_verify_query = mysqli_query($con, $token_verify);

    if (mysqli_num_rows($token_verify_query) > 0) {
        $row = mysqli_fetch_array($token_verify_query);
        if ($row['verification_status'] == '0') {
            $clicked_token = $row['verification_token'];
            $token_status = "UPDATE users SET verification_status = '1' WHERE verification_token ='$clicked_token' LIMIT 1 ";
            $token_status_query = mysqli_query($con, $token_status);

            if ($token_status_query) {
                $_SESSION['message'] = "You are verified ! Please login ";
                header("location:.././?redirect=success");
            } else {
                $_SESSION['message'] = "failed to verification";
                header("location:.././?redirect=error");
            }
        }else{
            $_SESSION['message'] = "You are already verified";
            header("location:.././?redirect=success");
        }
    } else {
        $_SESSION['message'] = "failed to verify";
        header("location:.././?redirect=error");
    }
} else {
    $_SESSION['message'] = "token not found";
    header("location:.././?redirect=error");
}
