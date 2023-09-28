<?php
require('../model/database.php');
session_start();

// checks current session, if its analytics will skip login, if its a different user type, it will destroy the session and make the user sign in
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
    #Viewing Analytics by Route:
    if($action == filter_input(INPUT_POST,'destination')){
        
        $destination = filter_input(INPUT_POST,'destination');

        if($action == filter_input(INPUT_POST,'next_7_days')){
             $bookings =  get_next_week_bookings_by_routes($destination);
        }
        else if($action == 'past_7_days'){
            $bookings = get_last_week_bookings_by_routes($destination);
        }
        else if($action == 'past_30_days'){
            $bookings = get_last_month_bookings_by_routes($destination);
        }
        else if($action == 'next_30_days'){
            $bookings = get_next_month_bookings_by_routes($destination);
        }
    }

    #Viewing Analytics by Day:
    if($action == filter_input(INPUT_POST,'day')){

        $day = filter_input(INPUT_POST,'day');

        if($action== filter_input(INPUT_POST,'next_7_days')){
            $bookings = get_next_week_bookings_by_day($day);
            $passenger_count = get_next_week_passenger_count($day);
        }
        else if($action==filter_input(INPUT_POST,'past_7_days')){
            $bookings = get_last_week_bookings_by_day($day);
            $passenger_count = get_last_week_passenger_count($day);
        }
        else if($action ==filter_input(INPUT_POST,'past_30_days')){
            $bookings = get_last_month_bookings_by_day($destination);
            $passenger_count = get_last_month_passenger_count($day);
    
        }
        else if($action == filter_input(INPUT_POST,'next_30_days')){
            $bookings = get_next_month_bookings_by_day($day);
            $passenger_count = get_next_month_passenger_count($day);
        }

    }

    include('view_analytics.php');
}

	


// code can be reused at each index page? for customers. Is there a better way?
else if($action == 'log_out'){
	session_destroy(); // This destroys the entire session
	header('Location: ../analytics_login/');
	
}


?>
