<?php
require('../model/database.php');
session_start();

// checks current session, if it's analytics will skip login, if its a different user type, it will destroy the session and make the user sign in
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['loggedin'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "analytics") {
                
                $action = 'analytics';
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != "analytics") {
                if($_SESSION['user_type'] == "customer"){
					
					header('Location: ../customer_login/');
				}else if($_SESSION['user_type'] == "driver"){
					
					header('Location: ../driver_login/');
				}
                
            }
        } else {
            header('Location: ../analytics_login/');
        }
    }
}

// displays the drivers view
if($action == 'analytics'){
	
	
	
	include('analytics.php');
	
	
}
// code can be reused at each index page? for customers. Is there a better way?
else if($action == 'log_out'){
	session_destroy(); // This destroys the entire session
	header('Location: ../analytics_login/');
	
}


?>