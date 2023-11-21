    <?php
    session_start();
    require('config/dbcon.php');

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login  = "SELECT * FROM users WHERE email = '$email' AND password = '$password' limit 1";
    $login_query = mysqli_query($con, $login);

    if (mysqli_num_rows($login_query) > 0) {
        $row = mysqli_fetch_assoc($login_query);

        if ($row['verification_status'] == '1') {

            $user_name = $row['name'];
            $user_email = $row['email'];

            $_SESSION['std_auth'] = true;
            $_SESSION['std_auth_user'] = [
                'user_name' => $user_name,
                'user_email' => $user_email,
            ];

            echo "login successfully";
        } else {
            echo "you are not verified";
        }
    } else {
        echo "invalid id or password";
    }


    ?>