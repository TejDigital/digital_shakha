

<?php
session_start();
require('./config/dbcon.php');

if(isset($_POST['grade_delete'])){
    $id = $_POST['grade_delete_id'];
    $sql= "DELETE FROM `internship_grade_tbl` WHERE grade_id  = $id";

    $sql_run = mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['digi_meg'] = "delete done";
        header('Location:./internship_track_grade.php');
    }else{
        $_SESSION['digi_meg'] = "deletion Failed";
        header('Location:./internship_track_grade.php');
    }
}
?>