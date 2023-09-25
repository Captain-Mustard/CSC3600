<?php
// Include necessary files
require('../model/database.php');
require('../model/login_user.php');

// Start a session
session_start();

// Check if an action is provided in the request
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    
    if ($action === NULL) {
        // If the user is already logged in, redirect them to the appropriate page
        if (isset($_SESSION['loggedin'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "customer") {
                header('Location: ../booking_platform/');
                exit();
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != "customer") {
                if ($_SESSION['user_type'] == "driver") {
                    header('Location: ../driver_login/');
                } elseif ($_SESSION['user_type'] == "analytics") {
                    header('Location: ../analytics_login/');
                }
            }
        } else {
            // If not logged in and no action provided, go to login
            $action = 'login_user';
        }
    }
}

// Load the login user page
if ($action == 'login_user') {
    include('customer_login.php');
} 
// Process user login
else if ($action == 'logged_in') {
    // Get username and password from POST data
    $username = filter_input(INPUT_POST, 'uni_id');
    $password = filter_input(INPUT_POST, 'password');
    
    // Check if the user exists in the database
    $user_login = login_check($username);

    if ($user_login && isset($user_login['unisqId']) && isset($user_login['password'])) {
        $db_username = $user_login['unisqId'];
        $db_password = $user_login['password'];

        // Verify the password and set the session
        if (password_verify($password, $db_password)) {
            session_regenerate_id(true); 
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $username;
            $_SESSION['user_type'] = "customer";
            header('Location: ../booking_platform/'); 
        } else {
            $error = 'Username or Password Incorrect';
            echo $error;
        }
    } else {
        $error = 'Please enter a valid username and password';
        echo $error;
    }
}
// Load the create user page
else if ($action == 'create_user') {
    include('create_user.php');
}
// Process user creation
else if ($action == 'user_created') {
    // Get user input
    $uni_id = filter_input(INPUT_POST, 'uni_id');
    $role = filter_input(INPUT_POST, 'role');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    
    // Check if the user already exists
    $user_login = login_check($uni_id);
    
    // Validate user input
    if ($uni_id == NULL) {
        $error = "Please enter a UniSQ ID";
    } elseif (isset($user_login['unisqId'])) {
        $error = "User already exists";
        echo $error;
    } elseif ($email == NULL) {
        $error = "Please enter an email address";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
        $error = "Please enter a valid email address";
    } elseif ($password == NULL) {
        $error = "Please enter a password";
    } else {
        // Hash the password and add the user to the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        add_passenger($uni_id, $role, $email, $hashed_password);
        echo "created user";
    }
} elseif ($action == 'logged_out') {
    // Destroy the session to log the user out
    session_destroy();
    include('login_user.php');
}
