<?php
require('../model/database.php');
require('../model/login_user.php');

session_start();

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

if ($action == 'login_user') {
    include('customer_login.php');
} elseif ($action == 'logged_in') {
    $username = filter_input(INPUT_POST, 'uni_id');
    $password = filter_input(INPUT_POST, 'password');
    
    $user_login = login_check($username);

    if ($user_login && isset($user_login['unisqId']) && isset($user_login['password'])) {
        $db_username = $user_login['unisqId'];
        $db_password = $user_login['password'];

        if (password_verify($password, $db_password)) {
            session_regenerate_id(true); 
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $username;
            $_SESSION['user_type'] = "customer";
            header('Location: ../booking_platform/'); 
            exit();
        } else {
            $error = 'Username or Password Incorrect';
            include('customer_login.php'); // Display the error message on the login page
        }
    } else {
        $error = 'Please enter a valid username and password';
        include('customer_login.php'); // Display the error message on the login page
    }
} elseif ($action == 'create_user') {
    include('create_user.php');
} elseif ($action == 'user_created') {
    $uni_id = filter_input(INPUT_POST, 'uni_id');
    $role = filter_input(INPUT_POST, 'role');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    
    $user_login = login_check($uni_id);

    // Check if the username already exists
    if ($user_login && isset($user_login['unisqId'])) {
        $error = 'Username already exists. Please choose a different username.';
        include('create_user.php'); // Display the error message on the create_user page
    } else {
        $uni_id_error = '';
        $email_error = '';
        $password_error = '';
        
        if (!preg_match('/^[uU]\d{7}$/', $uni_id)) {
            $uni_id_error = 'Invalid University ID';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = 'Invalid email address';
        }

        if (empty($password)) {
            $password_error = 'Please enter a password';
        }

        if (empty($uni_id_error) && empty($email_error) && empty($password_error)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            add_passenger($uni_id, $role, $email, $hashed_password);

            // Set a success message
            $_SESSION['success_message'] = 'User created. You may now log in to the system.';

            header('Location: ../booking_platform/');
            exit();
        } else {
            include('create_user.php'); // Display the validation error messages on the create_user page
        }
    }
} elseif ($action == 'logged_out') {
    session_destroy();
    include('customer_login.php');
}
?>

<!-- Add this JavaScript section at the bottom of the page -->
<script>
    function validateForm() {
        document.getElementById('uni_id_error').textContent = '';
        document.getElementById('email_error').textContent = '';
        document.getElementById('password_error').textContent = '';

        let uni_id = document.forms['userForm']['uni_id'].value;
        let email = document.forms['userForm']['email'].value;
        let password = document.forms['userForm']['password'].value;

        let uniIdRegex = /^[uU]\d{7}$/; // Matches 'u' or 'U' followed by 7 digits

        let isValid = true;

        if (!uniIdRegex.test(uni_id)) {
            document.getElementById('uni_id_error').textContent = 'Invalid University ID';
            isValid = false;
        }

        if (!validateEmail(email)) {
            document.getElementById('email_error').textContent = 'Invalid email address';
            isValid = false;
        }

        if (password.trim() === '') {
            document.getElementById('password_error').textContent = 'Please enter a password';
            isValid = false;
        }

        return isValid;
    }

    function validateEmail(email) {
        let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emailRegex.test(email);
    }
</script>
