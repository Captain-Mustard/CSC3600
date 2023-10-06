<?php

// Include necessary files and start the session
require('../model/database.php');
include('../model/analytics.php');
session_start();

// Check the action parameter to determine the page behavior
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        // Check if the user is already logged in
        if (isset($_SESSION['loggedin'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "analytics") {
                // If the user is an analytics user, show the analytics page
                $action = 'analytics';
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != "analytics") {
                // If the user is a different user type, destroy the session and redirect them
                if ($_SESSION['user_type'] == "customer") {
                    header('Location: ../customer_login/');
                } elseif ($_SESSION['user_type'] == "driver") {
                    header('Location: ../driver_login/');
                }
            }
        } else {
            // If no session is found, redirect to the analytics login page
            header('Location: ../analytics_login/');
        }
    }
}

// Handle different actions based on the value of the action parameter

// Display the analytics page
if ($action == 'analytics') {
    include('analytics.php');
}

// Handle analytics by day and week actions
if (in_array($action, ['past_7_days', 'past_30_days', 'next_7_days', 'next_30_days'])) {
    $day = filter_input(INPUT_POST, 'day');
    $bookings = get_bookings_by_day_and_week($action, $day);
    include('view_analytics.php');
}

// Handle analytics by route actions
if (in_array($action, ['next_7_routes', 'next_30_routes', 'last_7_routes', 'last_30_routes'])) {
    $end = filter_input(INPUT_POST, 'end');
    $bookings = get_bookings_by_route($action, $end);
    include('view_analytics.php');
}

// Show analytics by route page
if ($action == "get_routes") {
    include('analytics_by_route.php');
}

// Show analytics by day page
if ($action == "get_day") {
    include('analytics_by_day.php');
}

// Handle logout action
if ($action == 'log_out') {
    session_destroy(); // Destroy the entire session
    header('Location: ../analytics_login/');
}