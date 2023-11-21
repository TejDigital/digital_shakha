<?php
require('authentication.php');
require('./config/dbcon.php');

if(isset($_POST['full_name'])){
    $full_name = $_POST['full_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    
    $sql = "INSERT INTO contact_tbl(full_name,phone,email,message)VALUES('$full_name','$mobile','$email','$message')";
    $query = mysqli_query($con,$sql);

    if($query){
        echo "Thankyou We are connect soon";
        // header('location:../contact.php');
    }else{
        echo "Something went wrong";
        // header('location:../contact.php');
    }
}




if (isset($_POST['delete_con'])) {

    $id = $_POST['delete_con_id'];

    $query_delete = " DELETE FROM contact_tbl WHERE  id ='$id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['digital_msg'] = "Contact deleted";
        header('location:index.php');
    } else {
        $_SESSION['digital_msg'] = "CONTACT deletion failed";
        header('location:index.php');
    }
}

?>