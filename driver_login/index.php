<?php
require('../model/database.php');
require('../model/login_user.php');

// Start a session
session_start();

// Check the current session
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['loggedin'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "driver") {
                header('Location: ../driver_platform/');
                exit();
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != "driver") {
                // Redirect to appropriate pages based on user type
                if ($_SESSION['user_type'] == "customer") {
                    header('Location: ../customer_login/');
                } else if ($_SESSION['user_type'] == "analytics") {
                    header('Location: ../analytics_login/');
                }
            }
        } else {
            $action = 'login_driver';
        }
    }
}

// Display the login page
if ($action == 'login_driver') {
    include('driver_login.php');
} 

// Validate user login credentials
else if ($action == 'logged_in') {
    // Get the submitted username and password
    $username = filter_input(INPUT_POST, 'driver_id');
    $password = filter_input(INPUT_POST, 'password');
    
    // Retrieve user login information from the database
    $user_login = get_driver_login($username);
    
    if ($user_login && isset($user_login['driverUsername']) && isset($user_login['password'])) {
        $db_username = $user_login['driverUsername'];
        $db_password = $user_login['password'];
        
        // Verify the password
        if (password_verify($password, $db_password)) {
            // Set the session variables
            session_regenerate_id(true);
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $username;
            $_SESSION['user_type'] = "driver";
            header('Location: ../driver_platform/');
        } else {
            // Display an error message for incorrect username or password
            $error = 'Username or Password Incorrect';
            include('driver_login.php');
        }
    } else {
        // Display an error message for invalid username or password
        $error = "Please enter a valid username and password";
        include('driver_login.php');
    }
}
?>

<!-- Add this JavaScript section at the bottom of the page -->
<script>
    function validateForm() {
        document.getElementById('username_error').textContent = '';
        document.getElementById('password_error').textContent = '';

        let username = document.forms['driverForm']['driver_id'].value;
        let password = document.forms['driverForm']['password'].value;

        let isValid = true;

        if (username.trim() === '') {
            document.getElementById('username_error').textContent = 'Please enter a username';
            isValid = false;
        }

        if (password.trim() === '') {
            document.getElementById('password_error').textContent = 'Please enter a password';
            isValid = false;
        }

        return isValid;
    }
</script>
