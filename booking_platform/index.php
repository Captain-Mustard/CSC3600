<?php
// Include necessary files
require('../model/database.php');
session_start();

// Get the action from POST or GET parameters
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    
    if ($action === NULL) {
        // Check if the user is already logged in
        if (isset($_SESSION['loggedin'])) {
            // Use a switch statement to determine the action based on user type
            switch ($_SESSION['user_type']) {
                case "customer":
                    $action = 'booking_display';
                    break;
                case "driver":
                    header('Location: ../driver_login/');
                    exit;
                case "analytics":
                    header('Location: ../analytics_login/');
                    exit;
                default:
                    // Handle any other cases if necessary
                    break;
            }
        } else {
            // Redirect to customer login if not logged in
            header('Location: ../customer_login/');
            exit;
        }
    }
}

// Handle actions
if ($action == 'booking_display') {
    // Include the home page for customers
    include('booking_display.php');
} elseif ($action == 'log_out') {
    // Destroy the session and redirect to customer login
    session_destroy();
    header('Location: ../customer_login/');
}