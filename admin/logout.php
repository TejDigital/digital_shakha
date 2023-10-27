<?php
include('authentication.php');

include('config/dbcon.php');


// session_start();
if(isset($_POST['logout_btn'])){
    
    // unset($_SESSION['auth']);
    
    // unset($_SESSION['auth_user']);
    
    session_destroy();




    // session_unset();

    // $_SESSION['alert_msg'] = "logged out successfuly";

    header('location:adminlogin.php');
  

}
?>