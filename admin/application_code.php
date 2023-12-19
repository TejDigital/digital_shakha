<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['first_name'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $photo = $_FILES['photo']['name'];
    $sql = "SELECT * FROM application_tbl ORDER BY id DESC LIMIT 1";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        if ($row = mysqli_fetch_assoc($query)) {
            $Rid = $row['registration_id'];
            $get_num = str_replace("DS".date('y'), "",$Rid);
            $Rid_increase = $get_num + 1;
            $get_string = str_pad($Rid_increase,3,0,STR_PAD_LEFT);
            $Reg_id = "DS".date('y').$get_string;
            $sql = "INSERT INTO application_tbl(registration_id,name, last_name, gender, dob, profile_photo) VALUES ('$Reg_id','$first_name','$last_name','$gender','$dob','$photo')";

            $sql_run  = mysqli_query($con, $sql);
            $id = mysqli_insert_id($con);
    
            if ($sql_run) {
                move_uploaded_file($_FILES['photo']['tmp_name'], './student_application_photo/' . $photo);
                echo json_encode(array('success' => 1, 'data' => $id));
            } else {
                echo json_encode(10);
            }
        }
    } else {
        $Reg_id = "DS" . date('y') . "101";

        $sql = "INSERT INTO application_tbl(registration_id,name, last_name, gender, dob, profile_photo) VALUES ('$Reg_id','$first_name','$last_name','$gender','$dob','$photo')";

        $sql_run  = mysqli_query($con, $sql);
        $id = mysqli_insert_id($con);

        if ($sql_run) {
            move_uploaded_file($_FILES['photo']['tmp_name'], './student_application_photo/' . $photo);
            echo json_encode(array('success' => 1, 'data' => $id));
        } else {
            echo json_encode(10);
        }
    }
}
