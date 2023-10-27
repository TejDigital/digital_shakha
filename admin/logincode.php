<?php
session_start();
require('config/dbcon.php');
if(isset($_POST['login_btn']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_query = "SELECT * FROM users WHERE email='$email' AND password ='$password' LIMIT 1";
   

    $login_query_run = mysqli_query($con,$login_query);

    if(mysqli_num_rows($login_query_run) > 0){

            foreach($login_query_run as $row){
                
                $user_id = $row['id'];
                $user_name = $row['name'];
                $user_email = $row['email'];
                $status    =$row['status'];
                }
            $_SESSION['auth'] = "$status";
            $_SESSION['auth_user'] = [
                'user_id'=>$user_id,
                'user_name'=>$user_name,
                'user_email'=>$user_email,
            ];
            
                header('location:index.php');
                $_SESSION['alert_msg']= "Login Successful";
    }
    else{
        $_SESSION['alert_msg'] = "invalid Password or id !";
        header('location:adminlogin.php');
    }
}
else{
    $_SESSION['alert_msg'] = "Access Denied !";
    header('location:adminlogin.php');
}

?>