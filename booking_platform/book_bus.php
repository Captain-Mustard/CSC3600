<?php
// Include necessary files
require('../model/database.php');
require('../classes/bus_schedule_class.php');
require('../classes/bus_trip_class.php');

session_start();

// Check if the user is authenticated and has the necessary role (e.g., 'customer')
if (!isset($_SESSION['loggedin']) || $_SESSION['user_type'] !== 'customer') {
    // Redirect to the appropriate login page if not authenticated or authorized
    header('Location: ../customer_login/');
    exit;
}

// Get the user's ID and role from the session (replace with  actual session data)
$unisqId = $_SESSION['userid'];
$role = $_SESSION['user_type'];

// Define variables for user input
$date = $departure = $startTime = '';
$errors = array();
$success_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate user input
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $departure = filter_input(INPUT_POST, 'departure', FILTER_SANITIZE_STRING);
    $startTime = filter_input(INPUT_POST, 'startTime', FILTER_SANITIZE_STRING);

    // Perform validation (add more specific validation rules as needed)
    if (empty($date) || empty($departure) || empty($startTime)) {
        $errors[] = "All fields are required.";
    }

    // Check for valid date format (you may want to use a more specific format)
    if (!strtotime($date)) {
        $errors[] = "Invalid date format.";
    }

    // Check if the user input is free from SQL injection, XSS, etc.
    if (!isValidInput($date) || !isValidInput($departure) || !isValidInput($startTime)) {
        $errors[] = "Invalid input detected.";
    }

    // If there are no validation errors, proceed with booking
    if (empty($errors)) {
        // Create instances of the BusSchedule and BusTrip classes
        $busSchedule = new BusSchedule($db);
        $busTrip = new BusTrip($db);

        // Check if a schedule exists for the selected date, departure, and start time
        $existingSchedule = $busSchedule->getExistingSchedule($date, $departure, $startTime);

        if ($existingSchedule) {
            // Schedule exists, proceed to create the bus trip
            $scheduleId = $existingSchedule['scheduleId'];
            if ($busTrip->createTrip($unisqId, $scheduleId)) {
                $success_message = "Bus trip booked successfully!";
            } else {
                $errors[] = "Error booking the bus trip.";
            }
        } else {
            // Schedule does not exist, create a new schedule first
            if ($busSchedule->createSchedule($date, $departure, $startTime)) {
                // Schedule created successfully, now create the bus trip
                $existingSchedule = $busSchedule->getExistingSchedule($date, $departure, $startTime);
                if ($existingSchedule) {
                    $scheduleId = $existingSchedule['scheduleId'];
                    if (!is_int($scheduleId) || $scheduleId <= 0) {
                        // Handle the case where $scheduleId is not valid
                        $errors[] = "Invalid schedule ID.";
                    }
                    if ($busTrip->createTrip($unisqId, $scheduleId)) {
                        $success_message = "Bus trip booked successfully!";
                    } else {
                        $errors[] = "Error booking the bus trip.";
                    }
                } else {
                    $errors[] = "Error creating the schedule.";
                }
            } else {
                // Handle the error
                $errors[] = "Error creating the schedule.";
            }
        }
        
    }
}

// Include  HTML template for displaying the form and messages here
header('Location: booking_display.php');


// Function to validate input
function isValidInput($input) {
    // Implement input validation logic here
    // Return true if input is valid, false otherwise
    return true;
}
?>
