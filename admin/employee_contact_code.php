<?php
session_start();
require('./config/dbcon.php');
// echo "pre";
// print_r($_POST);
// echo "pre";
// die();

// Form data
$employee_organization_name = $_POST['employee_organization_name'];
$employee_industry = $_POST['employee_industry'];
$employee_website = $_POST['employee_website'];
$employee_fullname = $_POST['employee_fullname'];
$employee_position = $_POST['employee_position'];
$employee_email = $_POST['employee_email'];
$employee_phone = $_POST['employee_phone'];
$employee_partnership_interest = $_POST['employee_partnership_interest'];
$employee_goal_and_values = $_POST['employee_goal_and_values'];
$hear_about_us = $_POST['hear_about_us'];
$employee_questions = $_POST['employee_questions'];
$check_box = isset($_POST['check_box']) ? 1 : 0;

// SQL query to insert data into the table
$sql = "INSERT INTO employee_contact_tbl 
      ( `employee_organization_name`, `employee_industry`, `employee_website`, `employee_fullname`, `employee_position`, `employee_email`, `employee_phone`, `employee_partnership_interest`, `employee_goal_and_values`, `hear_about_us`, `employee_questions`)
        VALUES 
        ('$employee_organization_name', '$employee_industry', '$employee_website', '$employee_fullname', '$employee_position', '$employee_email', '$employee_phone', '$employee_partnership_interest', '$employee_goal_and_values', '$hear_about_us', '$employee_questions')";

if ($con->query($sql) === TRUE) {
    echo json_encode(array("msg"=> 1));
} else {
    echo json_encode(array("msg"=> 2));

}

$con->close();
?>
