<?php
session_start();
require('./config/dbcon.php');

if (isset($_POST['add'])) {
    $question = mysqli_real_escape_string($con, $_POST['question']);
    $question = str_replace("'", "\'", $question);

    $answer = mysqli_real_escape_string($con, $_POST['answer']);
    $answer = str_replace("'", "\'", $answer);
   

    $sql = "INSERT INTO faqs_tbl(faq_question,faq_ans) VALUES (?,?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $question,$answer);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        $_SESSION['digi_meg'] = "FAQ Added";
        header('Location: ./faqs.php');
    } else {
        $_SESSION['digi_meg'] = "Failed to add FAQ: " . mysqli_error($con);
        header('Location: ./faqs.php');
    }
}
?>
