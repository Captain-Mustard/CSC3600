<?php
require('../model/database.php');
session_start();


	
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['loggedin'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "customer") {
                $action = 'home_page';
                
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != "customer") {
                if($_SESSION['user_type'] == "driver"){
					
					header('Location: ../driver_login/');
				}else if($_SESSION['user_type'] == "analytics"){
					
					header('Location: ../analytics_login/');
				}
                
            }
        } else {
            header('Location: ../customer_login/');
        }
    }
}

if($action == 'home_page'){
	
	
	
	include('home_page.php');
	
	
}
// code can be reused at each index page? for customers. Is there a better way?
else if($action == 'log_out'){
	session_destroy(); // This destroys the entire session
	header('Location: ../customer_login/');
	
}


?>