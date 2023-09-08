<?php
require('../model/database.php');
session_start();

// verifies the session type i.e. is driver or takes the user to the login
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['loggedin'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "driver") {
                $action = 'driver_display';
                
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != "driver") {
                
				if($_SESSION['user_type'] == "customer"){
					
					header('Location: ../customer_login/');
				}else if($_SESSION['user_type'] == "analytics"){
					
					header('Location: ../analytics_login/');
				}
        } else {
            header('Location: ../driver_login/');
        }
    }
}
}
// displays the drivers view
if($action == 'driver_display'){
	
	
	
	include('driver_display.php');
	
	
}
// code can be reused at each index page? for customers. Is there a better way?
else if($action == 'log_out'){
	session_destroy(); // This destroys the entire session
	header('Location: ../driver_login/');
	
}


?>