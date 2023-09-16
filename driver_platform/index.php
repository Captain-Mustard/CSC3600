<?php
require('../model/database.php');
require('../model/driver_operations.php');
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


  
	
    $todays_day = date('l'); // this gets todays name
    
	$monday = 'Monday'; // hardcoded day as was testing on sunday

	include('driver_display.php');
	
	
}
// list busses for the day
else if($action == 'list_busses') {
	
	$destination = filter_input(INPUT_POST, 'destination');
	$day = 'Monday';
	
	$trips = get_days_trips($day, $destination);
	
	
	
	
	include('list_busses.php');
	
}

else if($action = 'get_passengers'){
	// takes todays date and output all bookings for the specific time and destination
	
	$destination = filter_input(INPUT_POST, 'destination');
	$bus_time = filter_input(INPUT_POST, 'bus_time');
	$date = date('Y-m-d');
	$day = 'Monday';
	
	$get_bus_schedule = get_bus_schedule($date, $day, $bus_time, $destination);
	
	if(isset($get_bus_schedule['scheduleId']) == false){
		
		// take driver to a booking page
		include('../booking_platform/home_page.php');
	}
	
	else{
	
	$bus_schedule = $get_bus_schedule['scheduleId'];
	
	
	
	$passengers_on_trips = get_passengers_by_schedule_ID($bus_schedule);
	
	include('list_passengers.php');
	}
}


// code can be reused at each index page? for customers. Is there a better way?
else if($action == 'log_out'){
	session_destroy(); // This destroys the entire session
	header('Location: ../driver_login/');
	
}


?>


