<?php
session_start();
require('config/dbcon.php');
if (isset($_POST['login_btn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";

    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {

        if($row = mysqli_fetch_assoc($login_query_run)) {
            if (password_verify($password, $row['password'])) {
                $user_id = $row['id'];
                $user_name = $row['name'];
                $user_email = $row['email'];
                $type    = $row['type'];

                $_SESSION['auth'] = "$type";
                $_SESSION['auth_user'] = [
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                    'user_email' => $user_email,
                ];

                if (isset($_SESSION['auth']) && $_SESSION['auth'] == "user") {
                    $_SESSION['alert_msg'] = "You are not authorized as admin";
                    unset($_SESSION['auth']);
                    header('location:adminlogin.php');
                } else {
                    $_SESSION['alert_msg'] = "Login Successful";
                    header('location:index.php');
                }
            } else {
                $_SESSION['alert_msg'] = "invalid Password ";
                header('location:adminlogin.php');
            }
        }
    } else {
        $_SESSION['alert_msg'] = "invalid  id !";
        header('location:adminlogin.php');
    }
} else {
    $_SESSION['alert_msg'] = "Access Denied !";
    header('location:adminlogin.php');
}
