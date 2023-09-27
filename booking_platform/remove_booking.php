<?php

session_start();

require('../model/database.php');
require('../model/bus_trips.php');

// Check if the user is logged in and retrieve the user ID
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $user_id = $_SESSION['userid']; // User ID
} else {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit();
}

// Check if the trip ID is provided in the POST request
if (isset($_POST['trip_id'])) {
    $trip_id = $_POST['trip_id'];

    // Delete the trip from the database using the user's ID and trip ID
    deleteBusTrip($db, $user_id, $trip_id);

    // Redirect back to the booking_display.php page
    header('Location: booking_display.php');
    exit();
} else {
    // Handle the case where the trip ID is not provided
    echo "Trip ID not provided.";
}
?>