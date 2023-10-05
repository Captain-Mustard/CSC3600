<?php
require('../model/database.php');
require('../model/bus_trips.php');
require('../model/driver_operations.php');

// Get the bus details from the POST or GET data
$busNo = filter_input(INPUT_POST, 'busNo') ?? filter_input(INPUT_GET, 'busNo');
$busTime = filter_input(INPUT_POST, 'bus_time') ?? filter_input(INPUT_GET, 'bus_time');
$destination = filter_input(INPUT_POST, 'destination') ?? filter_input(INPUT_GET, 'destination');

// Get the current local date in the format 'YYYY-MM-DD'
$currentDate = date('Y-m-d');

// Convert the current date to the day of the week (e.g., 'Monday', 'Tuesday', etc.)
$dayOfWeek = date('l', strtotime($currentDate));

// Get the bus schedule for the selected bus
$busSchedule = get_bus_schedule($currentDate, $dayOfWeek, $busTime);

// Check if the bus schedule was found
if (!empty($busSchedule)) {
    // Retrieve scheduleId from the first element of the array
    $scheduleId = $busSchedule[0]['scheduleId'];

    // Get the passengers for the selected schedule
    $passengers_on_trips = get_passengers_by_schedule_ID($scheduleId);

    // Include the HTML to display the passenger list
    include('../view/header.php');
    include('list_passengers.php'); // Make sure to create this file
    include('../view/footer.php');
} else {
    // Redirect to a specific page when busSchedule is empty
    header('Location: no_passengers_temp.php');
    exit();
}
?>
