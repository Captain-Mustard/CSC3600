<?php
require('../model/database.php');
require('../model/login_user.php');
// starts login session

session_start();


// checks current session, if its analytics will skip login, if its a different user type, it will destroy the session and make the user sign in
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['loggedin'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "analytics") {
                header('Location: ../analytics/');
                
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != "analytics") {
                if($_SESSION['user_type'] == "customer"){
					
					header('Location: ../customer_login/');
				}else if($_SESSION['user_type'] == "driver"){
					
					header('Location: ../driver_login/');
				}
                
            }
        } else {
            $action = 'analytics_login';
        }
    }
}

// takes users to the login page
if ($action == 'analytics_login') {
    
	include('analytics_login.php');
} 

// validates user login credentials
else if($action == 'logged_in'){
	// sets username for session after login validation
	$username = filter_input(INPUT_POST, 'username');
	$password = filter_input(INPUT_POST, 'password');
	
	
	
	$user_login = get_metrics_account($username);
	if ($user_login && isset($user_login['username']) && isset($user_login['password'])) {
    $db_username = $user_login['username'];
    $db_password = $user_login['password'];

    // sets the session
    if (password_verify($password, $db_password)) {
        session_regenerate_id(true); 
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $username;
        $_SESSION['user_type'] = "analytics";
        header('Location: ../analytics/'); 

    } else {
        $error = 'Username or Password Incorrect';
        echo $error;
    }
} else {
    $error = 'Please enter a valid username and password';
    echo $error;
}
}



// logs users out of session
else if ($action == 'logged_out'){
	session_destroy(); // This destroys the entire session
	include('analytics_login.php');
}

?>