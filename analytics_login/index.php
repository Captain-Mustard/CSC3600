<?php
session_start();
require('../model/database.php');
require('../model/login_user.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    
    if ($action === NULL) {
        // Check if the user is already logged in
        if (isset($_SESSION['loggedin'])) {
            switch ($_SESSION['user_type']) {
                case "analytics":
                    header('Location: ../analytics/');
                    exit();
                case "customer":
                    header('Location: ../customer_login/');
                    exit();
                case "driver":
                    header('Location: ../driver_login/');
                    exit();
                default:
                    // Handle any other cases if necessary
                    break;
            }
        } else {
            $action = 'analytics_login';
        }
    }
}

if ($action == 'analytics_login') {
    include('analytics_login.php');
} elseif ($action == 'logged_in') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    
    $user_login = get_metrics_account($username);

    if ($user_login && isset($user_login['username']) && isset($user_login['password'])) {
        $db_username = $user_login['username'];
        $db_password = $user_login['password'];

        if (password_verify($password, $db_password)) {
            session_regenerate_id(true); 
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $username;
            $_SESSION['user_type'] = "analytics";
            header('Location: ../analytics/'); 
            exit();
        } else {
            $error = 'Username or Password Incorrect';
            include('analytics_login.php');
        }
    } else {
        $error = 'Please enter a valid username and password';
        include('analytics_login.php');
    }
} elseif ($action == 'logged_out') {
    session_destroy();
    include('analytics_login.php');
}
?>
