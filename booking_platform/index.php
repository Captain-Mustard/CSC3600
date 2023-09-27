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
            // Redirect based on user type
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "customer") {
                $action = 'booking_display';
            } elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] != "customer") {
                if ($_SESSION['user_type'] == "driver") {
                    header('Location: ../driver_login/');
                } elseif ($_SESSION['user_type'] == "analytics") {
                    header('Location: ../analytics_login/');
                }
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