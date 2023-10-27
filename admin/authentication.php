<?php
session_start();
if (!isset($_SESSION['auth'])) {
    $_SESSION['auth_msg'] = "Login to access Dashboard";
    header('location: adminlogin.php');
    exit();
} elseif ($_SESSION['auth'] != "1") {
    $_SESSION['alert_msg'] = "You are not authorized as admin";
    header('location: adminlogin.php');
    exit();
}
?>