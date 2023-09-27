<?php
require('../model/database.php');
session_start();

// checks current session, if it's analytics will skip login, if it's a different user type, it will destroy the session and make the user sign in
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['loggedin'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "analytics") {
                $action = 'analytics';
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != "analytics") {
                if ($_SESSION['user_type'] == "customer") {
                    header('Location: ../customer_login/');
                } elseif ($_SESSION['user_type'] == "driver") {
                    header('Location: ../driver_login/');
                }
            }
        } else {
            header('Location: ../analytics_login/');
        }
    }
}

// displays the driver's view
if ($action == 'analytics') {
    include('analytics.php');
    // #if input = by routes loop:
    // #$view_by = filter_input(INPUT_POST,'action')
    if ($action == 'next_7_days') {
        // $destination is undefined; you need to define it.
        // $bookings =  get_next_week_bookings_by_routes($destination);
    } elseif ($action == 'past_7_days') {
        // $destination is undefined; you need to define it.
        // $bookings = get_last_week_bookings_by_routes($destination);
    } elseif ($action == 'past_30_days') {
        // $destination is undefined; you need to define it.
        // $bookings = get_last_month_bookings_by_routes($destination);
    }

    // #include('view_analytics.php');

    // #if input = by day loop:
    if ($action == 'next_7_days') {
        // $day is undefined; you need to define it.
        // $bookings = get_next_week_bookings_by_day($day);
    } elseif ($action == 'past_7_days') {
        // $day is undefined; you need to define it.
        // $bookings = get_last_week_bookings_by_day($day);
    } elseif ($action == 'past_30_days') {
        // $destination is undefined; you need to define it.
        // $bookings = get_last_month_bookings_by_day($destination);
    }

    // #include('analytics.php');
}

// code can be reused at each index page? for customers. Is there a better way?
elseif ($action == 'log_out') {
    session_destroy(); // This destroys the entire session
    header('Location: ../analytics_login/');
}
?>
