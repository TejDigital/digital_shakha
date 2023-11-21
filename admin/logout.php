<?php
session_start();
if (isset($_POST['logout_btn'])) {
    session_destroy();
    header('location: adminlogin.php');
    exit();
}

include('authentication.php'); // Include this after handling the logout
include('config/dbcon.php');
?>
