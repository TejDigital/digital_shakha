<?php
session_start();
if (!isset($_SESSION['auth']) && !$_SESSION['auth']) {
    $_SESSION['auth_msg'] = "please login to access the dash board !";
    header('location: adminlogin.php');
    exit();
} 
?>