<?php

require('../model/database.php');
include('../model/analytics.php');

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



if($action == 'past_7_days'){
	
	$day = filter_input(INPUT_POST,'day');
	$bookings = get_last_week_bookings_by_day($day);
	include('view_analytics.php');
}


if($action == "past_30_days"){
	
	$day = filter_input(INPUT_POST,'day');
	$bookings = get_last_month_bookings_by_day($day);
	include('view_analytics.php');
	
}

if($action == "next_7_days"){
	
	$day = filter_input(INPUT_POST,'day');
	$bookings = get_next_week_bookings_by_day($day);
	include('view_analytics.php');
	
}


if($action == "next_30_days"){
	
	$day = filter_input(INPUT_POST,'day');
	$bookings = get_next_month_bookings_by_day($day);
	include('view_analytics.php');
	
}

if($action == "next_7_routes"){
	
	$day = filter_input(INPUT_POST,'end');
	$bookings = get_next_week_bookings_by_routes($day);
	include('view_analytics.php');
	
}

if($action == "next_30_routes"){
	
	$day = filter_input(INPUT_POST,'end');
	$bookings = get_next_month_bookings_by_routes($day);
	include('view_analytics.php');
	
}


if($action == "last_7_routes"){
	
	$day = filter_input(INPUT_POST,'end');
	$bookings = get_last_week_bookings_by_routes($day);
	include('view_analytics.php');
	
}

if($action == "last_30_routes"){
	
	$day = filter_input(INPUT_POST,'end');
	$bookings = get_last_month_bookings_by_routes($day);
	include('view_analytics.php');
	
}

if($action == "get_routes"){
	
	
	include('analytics_by_route.php');
	
}

if($action == "get_day"){
	
	
	include('analytics_by_day.php');
	
}

// code can be reused at each index page? for customers. Is there a better way?
if ($action == 'log_out'){
	session_destroy(); // This destroys the entire session
	header('Location: ../analytics_login/');
	
}

?>
