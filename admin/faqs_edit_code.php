<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $question = mysqli_real_escape_string($con, $_POST['question']);
    $question = str_replace("'", "\'", $question);

    $answer = mysqli_real_escape_string($con, $_POST['answer']);
    $answer = str_replace("'", "\'", $answer);

        $sql = "UPDATE faqs_tbl SET faq_question = ? ,faq_ans=? ,faq_status =? WHERE faqs_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssii",$question,$answer,$status ,$id);
        mysqli_stmt_execute($stmt);
    

    if ($stmt) {
        $_SESSION['digi_meg'] = "FAQs Updated";
        header('Location: ./faqs.php');
    } else {
        $_SESSION['digi_meg'] = "Error updating FAQs: " . mysqli_error($con);
        header('Location: ./faqs.php');
    }
}
?>
