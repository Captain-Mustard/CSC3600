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
                    $action = 'list_busses';
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

// list busses for the day
if($action == 'list_busses') {
	
	$destination = filter_input(INPUT_POST, 'destination');
	$date = filter_input(INPUT_POST,'day');
	$day = date('l',strtotime($date));
	$trips = get_days_trips($day, $destination);
	
	include('list_busses.php');
}

else if ($action == 'passenger_marked_off') {
    $off_time = filter_input(INPUT_POST, 'off_time');
    $finished = 'True';
    $trip_id = filter_input(INPUT_POST, 'trip_id');
    $uni_id = filter_input(INPUT_POST, 'uni_id');
    $busNo = filter_input(INPUT_POST, 'busNo'); // Add this line to get busNo
    $busTime = filter_input(INPUT_POST, "bus_time"); // Add this line to get busNo
    $destination = filter_input(INPUT_POST, 'destination'); // Add this line to get destination

    mark_off_passenger($off_time, $finished, $trip_id, $uni_id);

    // Redirect back to the list_passengers page after updating the passenger
    header('Location: listPassengers.php?busNo=' . urlencode($busNo) . '&destination=' . urlencode($destination) . '&off_time=' . urlencode($off_time) . 
            '&finished=' . urlencode($finished) . '&trip_id=' . urlencode($trip_id) . '&uni_id=' . urlencode($uni_id) . '&bus_time=' . urlencode($busTime));
    exit();
}

// code can be reused at each index page? for customers. Is there a better way?
else if($action == 'log_out'){
	session_destroy(); // This destroys the entire session
	header('Location: ../driver_login/');
	
}
?>