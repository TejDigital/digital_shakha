<?php
require('./config/dbcon.php');

$opportunities_id = mysqli_real_escape_string($con,$_POST['opportunities_id']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$image = $_FILES['image']['name'];

$sql = "INSERT INTO opportunities_request_tbl(opportunities_id,name,phone, email,image) VALUES (?,?,?,?,?)";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "issss",$opportunities_id,$name,$phone,$email,$image);
mysqli_stmt_execute($stmt);

if ($stmt) {
    move_uploaded_file($_FILES['image']['tmp_name'], './opportunities_request_files/' . $image);
    echo json_encode(array("res" => 1));
} else {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(array("res" => 0));
}



?>