<?php
require('../model/database.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL AND isset($_SESSION['loggedin']) == FALSE) {
        $action == 'log_out';
    } else if ($action === NULL AND isset($_SESSION['loggedin'])) {
		$action = 'home_page';
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