<?php
require('../model/database.php');
require('../model/driver_operations.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    
    if ($action === NULL) {
        // Check for specific session variables to determine if the user is logged in as a driver or another type
        if (isset($_SESSION['user_type'])) {
            switch ($_SESSION['user_type']) {
                case "driver":
                    $action = 'driver_display';
                    break;
                case "customer":
                    header('Location: ../customer_login/');
                    exit();
                case "analytics":
                    header('Location: ../analytics_login/');
                    exit();
                default:
                    // Handle any other cases if necessary
                    break;
            }
        } else {
            header('Location: ../driver_login/');
            exit();
        }
    }
}

// displays the drivers view
if($action == 'driver_display'){

	$date = filter_input(INPUT_POST,'day');
	$day = date('l',strtotime($date));
	
	include('driver_display.php');
	
}
// list busses for the day
else if($action == 'list_busses') {
	
	$destination = filter_input(INPUT_POST, 'destination');
	$date = filter_input(INPUT_POST,'day');
	$day = date('l',strtotime($date));
	$trips = get_days_trips($day, $destination);
	
	include('list_busses.php');
	
}

else if($action == 'get_passengers'){

	// takes todays date and output all bookings for the specific time and destination
	
	$destination = filter_input(INPUT_POST, 'destination');
	$bus_time = filter_input(INPUT_POST, 'bus_time');
	$date = filter_input(INPUT_POST,'day');
	$day = date('l',strtotime($date));
	#$schedule_id = filter_input(INPUT_POST,'schedule_id');
	$schedule_id = '1';

	$get_bus_schedule = get_bus_schedule($date, $day, $bus_time, $destination);

	$passengers_on_trips = get_passengers_by_schedule_ID($schedule_id);
	$passenger_count = count($passengers_on_trips);
	
	if ($passenger_count >= 1){
		include('list_passengers.php');

	}else{
		include('no_passengers_found.php');

	}

}else if ($action == 'passenger_marked_off'){

	$off_time = filter_input(INPUT_POST, 'off_time');
	$finished = 'True' ;
	$trip_id = filter_input(INPUT_POST,'trip_id');
	$uni_id = filter_input(INPUT_POST, 'uni_id');

	$passengers_off = mark_off_passenger($off_time, $finished, $trip_id, $uni_id);

	include('check_off_passenger.php');


}


// code can be reused at each index page? for customers. Is there a better way?
else if($action == 'log_out'){
	session_destroy(); // This destroys the entire session
	header('Location: ../driver_login/');
	
}


?>

