<?php
session_start();
require('../model/database.php');

// Initialize variables for form data and errors
$trip_day = $bus_number = $bus_date = $bus_time = $start_location = $stop_location = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and capture form inputs
    $trip_day = $_POST['trip_day'];
    $bus_number = $_POST['bus_number'];
    $bus_date = $_POST['bus_date'];
    $bus_time = $_POST['bus_time'];
    $start_location = $_POST['start_location'];
    $stop_location = $_POST['stop_location'];

    // Perform form validation
    if (empty($trip_day)) {
        $errors[] = 'Trip day is required.';
    }
    // Add more validation rules as needed

    // If there are no validation errors, proceed with database insertion
    if (empty($errors)) {
        // Call the function to insert the new trip
        // Replace this with the actual function call
        insertNewBusTrip($trip_day, $bus_number, $bus_date, $bus_time, $start_location, $stop_location);

        // Redirect to booking_display.php after successful insertion
        header('Location: booking_display.php');
        exit();
    }
}

?>

<html>
<head>
    <title>Book a New Bus Trip</title>
    <!-- Include any necessary CSS styles here -->
</head>
<body>
    <h1>Book a New Bus Trip</h1>
    
    <!-- Display validation errors, if any -->
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    
    <form action="booking_add.php" method="POST">
    <label for="bus_date">Date:</label>
    <input type="date" name="bus_date" required>
    <br>
    <label for="start_location">Start Location:</label>
    <select name="start_location" id="start_location" required>
        <option value="Toowoomba">Toowoomba</option>
        <option value="Springfield">Springfield</option>
    </select>
    <br>
    <label for="stop_location">Stop Location:</label>
    <select name="stop_location" id="stop_location" disabled required>
        <option value="Springfield">Springfield</option>
        <option value="Toowoomba">Toowoomba</option>
    </select>
    <br>
    <label for="bus_time">Time:</label>
    <select name="bus_time" id="bus_time" required>
        <option value="0630">06:30</option>
        <option value="0715">07:15</option>
        <option value="0745">07:45</option>
        <option value="0845">08:45</option>
        <option value="1000">10:00</option>
        <option value="1030">10:30</option>
        <option value="1100">11:00</option>
        <option value="1200">12:00</option>
    </select>
    <br>
    <input type="submit" value="Book">
</form>

    
    <!-- Add a button to cancel and go back to booking_display.php -->
    <a href="booking_display.php">Cancel</a>
</body>
</html>

<script>
document.getElementById("start_location").addEventListener("change", function() {
    var startLocation = this.value;
    var stopLocationSelect = document.getElementById("stop_location");
    
    if (startLocation === "Toowoomba") {
        stopLocationSelect.value = "Springfield";
    } else if (startLocation === "Springfield") {
        stopLocationSelect.value = "Toowoomba";
    }
    // Enable the "Stop Location" field
    stopLocationSelect.disabled = false;
});
</script>

