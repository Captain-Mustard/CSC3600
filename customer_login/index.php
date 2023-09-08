<?php
require('../model/database.php');
require('../model/login_user.php');
// starts login session

session_start();



// need to utilise session to ensure users is kept logged in

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['loggedin'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "customer") {
                header('Location: ../booking_platform/');
                exit();
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != "customer") {
                if($_SESSION['user_type'] == "driver"){
					
					header('Location: ../driver_login/');
				}else if($_SESSION['user_type'] == "analytics"){
					
					header('Location: ../analytics_login/');
				}
                
            }
        } else {
            $action = 'login_user';
        }
    }
}


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

if ($user_login && isset($user_login['unisqId']) && isset($user_login['password'])) {
    $db_username = $user_login['unisqId'];
    $db_password = $user_login['password'];

    // sets the session
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

else if ($action == 'create_user') {
    
	include('create_user.php');
}
// validates new user information, and validated if the account is created
else if ($action == 'user_created'){
	
	$uni_id = filter_input(INPUT_POST, 'uni_id');
	$role = filter_input(INPUT_POST, 'role');
	$email = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');
	
	$user_login = login_check($uni_id);
	
	// error handling for user input -- requires proper display of errors
	if($uni_id == NULL) {
		$error = "Please enter a UniSQ ID";
	} else if(isset($user_login['unisqId'])){
		$error = "User already exists";
		echo $error;
	}
	else if($email == NULL){
		$error = "Please enter an email address";
		
	} else if(filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE){
		
		$error = "Please enter a valid email address";
	}
	else if($password == NULL){
		$error = "Please enter an password";
		
	}
	else {
	
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	
	add_passenger($uni_id, $role, $email, $hashed_password);
	
	echo "created user";
	}
	
	

}else if ($action == 'logged_out'){
	session_destroy(); // This destroys the entire session
	include('login_user.php');
}

?>