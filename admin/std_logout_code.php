<?php
session_start();
    unset($_SESSION['std_auth']);
    unset($_SESSION['std_auth_user']);
    unset($_SESSION['message']);
    echo "You are logout";

?>