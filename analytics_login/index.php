<?php
// Start a session or resume the current session
session_start();

// Include necessary database and user login-related files
require('../model/database.php');
require('../model/login_user.php');

// Determine the action based on the request method (POST or GET)
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    
    if ($action === NULL) {
        // Check if the user is already logged in and redirect based on user type
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

// Handle different actions
if ($action == 'analytics_login') {
    // Display the analytics login form
    include('analytics_login.php');
} elseif ($action == 'logged_in') {
    // Retrieve username and password from POST data
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    
    // Get user login information from the database
    $user_login = get_metrics_account($username);

    if ($user_login && isset($user_login['username']) && isset($user_login['password'])) {
        $db_username = $user_login['username'];
        $db_password = $user_login['password'];

        // Verify the provided password against the hashed password in the database
        if (password_verify($password, $db_password)) {
            // Regenerate session ID for security
            session_regenerate_id(true);
            
            // Set session variables to indicate the user is logged in
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $username;
            $_SESSION['user_type'] = "analytics";
            
            // Redirect to the analytics dashboard
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
    // Destroy the session to log the user out
    session_destroy();
    
    // Display the analytics login form
    include('analytics_login.php');
}
?>
