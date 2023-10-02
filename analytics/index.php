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
    include('analytics.php');
}

elseif ($action == 'view_analytics'){

    # if One of the analytics buttons clicked without any input, will get error message.
    if (filter_input(INPUT_POST,'submit_start')==='' || filter_input(INPUT_POST,'submit_end')===''
    || filter_input(INPUT_POST,'submit_day')===''){
        $_POST['submit_start'] = NULL;
        $_POST['submit_end'] = NULL;
        $_POST['submit_day'] = NULL;
    }
    #If both the start and end destinations are set:
    elseif (NULL!==(filter_input(INPUT_POST,'submit_start')) && (NULL!==(filter_input(INPUT_POST,'submit_end')))){
        $print_start = filter_input(INPUT_POST,'start');
        $print_end = filter_input(INPUT_POST,'end');
        echo gettype($print_start), gettype($print_end);

        $route_analytics;
        $valid_input;

    #If the day is set, then $day_analytics = True, $valid_input = True:
    }elseif (null!==(filter_input(INPUT_POST,'submit_day'))){

        $day_analytics;
        $valid_input;

    # Message requesting either 2 options of valid input.
    }else{
        Echo "Please select either a start and end location, or submit a day.";

    }

    if ($valid_input){
        if($route_analytics){

            $destination = filter_input(INPUT_POST,'end');

            if ($action == 'next_7_days'){
                $bookings =  get_next_week_bookings_by_routes($destination);
            }
            if ($action == 'past_7_days'){
                $bookings = get_last_week_bookings_by_routes($destination);
            }
            if ($action == 'past_30_days'){
                $bookings = get_last_month_bookings_by_routes($destination);
            }
            if ($action == 'next_30_days'){
                $bookings = get_next_month_bookings_by_routes($destination);
            }

        }if($day_analytics){

            $day = filter_input(INPUT_POST,'day');

            if ($action == 'next_7_days'){
                $bookings = get_next_week_bookings_by_day($day);
                $passenger_count = get_next_week_passenger_count($day);
            }
            if ($action == 'past_7_days'){
                $bookings = get_last_week_bookings_by_day($day);
                $passenger_count = get_last_week_passenger_count($day);
            }
            if ($action == 'past_30_days'){
                $bookings = get_last_month_bookings_by_day($destination);
                $passenger_count = get_last_month_passenger_count($day);
            }
            if ($action == 'next_30_days'){
                $bookings = get_next_month_bookings_by_day($day);
                $passenger_count = get_next_month_passenger_count($day);   
            }
        }
    }
    
}


// code can be reused at each index page? for customers. Is there a better way?
if ($action == 'log_out'){
	session_destroy(); // This destroys the entire session
	header('Location: ../analytics_login/');
	
}

?>
