<?php
session_start();
require('config/dbcon.php');

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$login  = "SELECT * FROM users WHERE email = ? limit 1";
$stmt = mysqli_prepare($con, $login);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$login_query = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($login_query)) {
    if (password_verify($password, $row['password'])) {
        if ($row['verification_status'] == '1') {
            $user_name = $row['name'];
            $user_email = $row['email'];

            $_SESSION['std_auth'] = true;
            $_SESSION['std_auth_user'] = [
                'user_name' => $user_name,
                'user_email' => $user_email,
            ];

            header('HTTP/1.1 200 OK');
            echo json_encode(array("res" => '1'));
        } else {
            // header('HTTP/1.1 401 Unauthorized');
            echo json_encode(array("res" => '2'));
        }
    } else {
        // header('HTTP/1.1 401 Unauthorized');
        echo json_encode(array("res" => '3'));
    }
} else {
    // header('HTTP/1.1 401 Unauthorized');
    echo json_encode(array("res" => '4'));
}

mysqli_close($con);
?>
