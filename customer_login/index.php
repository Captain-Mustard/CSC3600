<?php
require('../model/database.php');
require('../model/login_user.php');

// need to utilise session to ensure users is kept logged in

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_user';
    }
}

/* if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    header("Location: dashboard.php");
    exit;
} */

// takes users to the login page
if ($action == 'login_user') {
    
	include('login_user.php');
} 

// validates user login credentials
else if($action == 'logged_in'){
	
	$username = filter_input(INPUT_POST, 'uni_id');
	$password = filter_input(INPUT_POST, 'password');
	
	$user_login = login_check($username, $password);
		$db_username = $user_login['unisq_Id'];
		$db_password = $user_login['password'];
	
	$make_hashed_password = password_hash($db_password, PASSWORD_DEFAULT);
	
	if($make_hashed_password == $user_password AND $username == $db_username){
		
	 /* $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $username; */
		include('logged_inn.php');
		
		
	} else {
		$error = 'Username or Password Incorrect';
	}
}
// takes users to the booking page
else if ($action == 'user_booking') {
    
	
	
	
	include('user_booking.php');

// take users to the page to view their bookings
} else if ($action == 'view_booking'){
	
		
} 
// lets a new user create thier account
else if ($action == 'create_user') {
    
	include('create_user.php');
}
// validates new user information, and validated if the account is created
else if ($action == 'user_created'){
	
	$uni_id = filter_input(INPUT_POST, 'uni_id');
	$role = filter_input(INPUT_POST, 'role');
	$eamil = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');
	
	if($uni_id == NULL) {
		$error = "Please enter a UniSQ ID"
	} 
	else if(){
		
		
	}
	else {
	
	$make_hashed_password = password_hash($password, PASSWORD_DEFAULT);
	
	add_passenger($uni_id, $role, $email, $make_hashed_password);
	}
	
	
}
else if ($action == 'logged_out'){
	
	include('login_user.php');
}

?>