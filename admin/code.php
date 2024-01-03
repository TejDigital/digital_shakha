<?php
session_start();
include('config/dbcon.php');

if (isset($_POST['check_Emailbtn'])) {

    $email = $_POST['email'];

    $confirmemail = "SELECT email FROM users WHERE email='$email'";
    $confirmemail_run = mysqli_query($con, $confirmemail);

    if (mysqli_num_rows($confirmemail_run) > 0) {

        echo " Email Already teken";
    } else {
        echo " Email Available ";
    }
}

if (isset($_POST['adduser'])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $type = $_POST["type"];
    $confirmpassword = $_POST["confirmpassword"];

    if ($password == $confirmpassword) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $confirmemail = "SELECT email FROM users WHERE email='$email'";
        $confirmemail_run = mysqli_query($con, $confirmemail);

        if (mysqli_num_rows($confirmemail_run) > 0) {

            $_SESSION['cons_msg'] = "Email Already taken !";
            header('location:registered.php');
        } else {
            $adduser_qurey = "INSERT INTO users(name,phone,email,password,type) values('$name','$phone','$email','$hashed_password','$type')";

            $adduser_connect_db = mysqli_query($con, $adduser_qurey);

            if ($adduser_connect_db) {
                $_SESSION['cons_msg'] = "New User Add successful";
                header('location:registered.php');
            } else {
                $_SESSION['cons_msg'] = "User not Added";
                header('location:registered.php');
            }
        }
    } else {
        $_SESSION['cons_msg'] = "Password does not match";
        header('location:registered.php');
    }
}

// ---------------Update----------------------

if (isset($_POST['updateuser'])) {

    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $role_as = $_POST["type"];

    $query = "UPDATE users SET  name='$name',email='$email', phone='$phone' ,password='$hashed_password',type='$role_as' WHERE id='$user_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['cons_msg'] = "User details Updated";
        header('location:registered.php');
    } else { 
        $_SESSION['cons_msg'] = " failed";
        header('location:registered.php');
    }
}
// ==================================================Hotel==========================================




// ---------------------------------delete-for-user------------------------------

if (isset($_POST['deleteuser'])) {

    $user_id = $_POST['delete_id'];

    $query_delete = " DELETE FROM users WHERE  id ='$user_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['cons_msg'] = "User details deleted";
        header('location:users.php');
    } else {
        $_SESSION['cons_msg'] = "User details deletion failed";
        header('location:users.php');
    }
}
// ---------------------------------delete-for-employee------------------------------

if (isset($_POST['delete_employee'])) {

    $user_id = $_POST['delete_id'];

    $query_delete = " DELETE FROM users WHERE  id ='$user_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['cons_msg'] = "User details deleted";
        header('location:registered.php');
    } else {
        $_SESSION['cons_msg'] = "User details deletion failed";
        header('location:registered.php');
    }
}



// --------------------------------forget_ID Pass-----------
if(isset($_POST['find'])){

    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    $sql1 = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $query1 = mysqli_query($con,$sql1);
    $result = mysqli_num_rows($query1);

    if($result == 1){
        $_SESSION['cons_msg'] = "Set A new Password Here";
        header('location:./forget_pass.php?email='.$email);
    }else{
        $_SESSION['cons_msg'] = "this Id Is not in Database";
        header('location:adminlogin.php');
    }
}


// --------------------set-new-password-------------

if(isset($_POST['set'])){

    $id = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    // echo $id;
    // echo "<br>";
    // echo $password;
    // echo "<br>";
  
    

    if($password == $c_password){

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // echo $hashed_password;
        // echo "<br>";

        // die();

        $sql2 = "UPDATE users SET password='$hashed_password' where email ='$id'";
        $query2 = mysqli_query($con, $sql2);
        if($query2){
            $_SESSION['cons_msg'] = "new password set";
            header('location: adminlogin.php');
        }else{
            $_SESSION['cons_msg'] = "failed";
            header('location: ./forget_pass.php');
        }
    }else{
        $_SESSION['cons_msg'] = "Password and confirm password not match";
        header('location: ./forget_pass.php?email='.$id);
    }
}