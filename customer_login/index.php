<?php
require('../model/database.php');
require('../model/login_user.php');
// starts login session
session_start();

// need to utilise session to ensure users is kept logged in

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL AND isset($_SESSION['loggedin']) == FALSE) {
        $action = 'login_user';
    } else if ($action === NULL AND isset($_SESSION['loggedin']) ){
		
		header('Location: ../booking_platform/');
		
	}
}

/* if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    header("Location: dashboard.php");
    exit;
} */

// takes users to the login page
if ($action == 'login_user') {
    
	include('customer_login.php');
} 

// validates user login credentials
else if($action == 'logged_in'){
	// sets username for session after login validation
	$username = filter_input(INPUT_POST, 'uni_id');
	$password = filter_input(INPUT_POST, 'password');
	
	
	
	$user_login = login_check($username);
		$db_username = $user_login['unisqId'];
		$db_password = $user_login['password'];
	
		
		//echo password_verify($password, $db_password);
		
		
			if(password_verify($password, $db_password)){
			session_regenerate_id(true); 
			$_SESSION['loggedin'] = true;
			$_SESSION['userid'] = $username;
			header('Location: ../booking_platform/'); 
				
		
			} else {
			
				$error = 'Username or Password Incorrect';
				echo $error;
		} 
}

else if ($action == 'create_user') {
    
	include('create_user.php');
}
// validates new user information, and validated if the account is created
else if ($action == 'user_created'){
	
	$uni_id = filter_input(INPUT_POST, 'uni_id');
	$role = filter_input(INPUT_POST, 'role');
	$email = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');
	
	if($uni_id == NULL) {
		$error = "Please enter a UniSQ ID";
	} 
	else if($email == NULL){
		$error = "Please enter an email address";
		
	}
	else {
	
	$make_hashed_password = password_hash($password, PASSWORD_DEFAULT);
	
	add_passenger($uni_id, $role, $email, $make_hashed_password);
	
	echo "created user";
	}
	
	
}
else if ($action == 'logged_out'){
	session_destroy(); // This destroys the entire session
	include('login_user.php');
}

?>