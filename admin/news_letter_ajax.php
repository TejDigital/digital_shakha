<?php
require('./config/dbcon.php');


$email = mysqli_real_escape_string($con,$_POST['email']);


$sql = "INSERT INTO news_letter_tbl(news_email) VALUES ('$email')";
$sql_run = mysqli_query($con,$sql);
if($sql_run){
    echo json_encode(array("res" => '1'));
}else{
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(array("res" => '0'));
}
?>