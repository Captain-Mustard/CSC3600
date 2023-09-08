<?php
require('../model/database.php');
require('../model/login_user.php');
// starts login session

session_start();


// checks current session, if its driver will skip login, if its a different user type, it will destroy the session and make the user sign in
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['loggedin'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "driver") {
                header('Location: ../driver_platform/');
                exit();
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "customer") {
                session_destroy();
				$action = 'login_driver';
                
            }
        } else {
            $action = 'login_driver';
        }
    }
}

// takes users to the login page
if ($action == 'login_driver') {
    
	include('driver_login.php');
} 

// validates user login credentials
else if($action == 'logged_in'){
	// sets username for session after login validation
	$username = filter_input(INPUT_POST, 'driver_id');
	$password = filter_input(INPUT_POST, 'password');
	
	
	
	$user_login = get_driver_login($username);
		$db_username = $user_login['driverUsername'];
		$db_password = $user_login['password'];
	
		
		
		
			// sets the session
			if(password_verify($password, $db_password)){
			session_regenerate_id(true); 
			$_SESSION['loggedin'] = true;
			$_SESSION['userid'] = $username;
			$_SESSION['user_type'] = "driver";
			header('Location: ../driver_platform/'); 
				
		
			} else {
			
				$error = 'Username or Password Incorrect';
				echo $error;
		} 
}



// logs users out of session
else if ($action == 'logged_out'){
	session_destroy(); // This destroys the entire session
	include('driver_login.php');
}

?>