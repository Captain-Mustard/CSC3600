<?php 
include '../view/header.php';
require('../model/database.php');
require('../model/bus_trips.php'); // Include the bus_trips.php file

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in and retrieve the user ID
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $user_id = $_SESSION['userid']; // User ID
} else {
    // Redirect to customer login if not logged in
    header('Location: ../customer_login/');
    exit();
}

// Fetch the user's bus trips using the new function from bus_trips.php
$bus_trips = getBusTripsByUserId($db, $user_id);
?>

<html>
<head>
    <title>Your Bus Trips</title>
    <!-- Include the main.css file for styling -->
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <!-- Apply the "container" class to the main content container -->
    <div class="container">
        <h1>Your Bus Trips</h1>
        
        <!-- Add a welcome message -->
        <p>Welcome <?php echo $user_id; ?>, here are your upcoming shuttle bus bookings.</p>
        
        <table border="1">
            <tr>
                <th>Trip ID</th>
                <th>Day</th>
                <th>Bus Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Start Location</th>
                <th>Stop Location</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
            <?php foreach ($bus_trips as $trip) : ?>
                <tr>
                    <td><?php echo $trip['tripId']; ?></td>
                    <td><?php echo $trip['tripDay']; ?></td>
                    <td><?php echo $trip['busNumber']; ?></td>
                    <td><?php echo $trip['busDate']; ?></td>
                    <td><?php echo $trip['busTime']; ?></td>
                    <td><?php echo $trip['startLocation']; ?></td>
                    <td><?php echo $trip['stopLocation']; ?></td>
                    <td>
                        <!-- Add a button to remove the booking -->
                        <form action="remove_booking.php" method="post">
                            <input type="hidden" name="trip_id" value="<?php echo $trip['tripId']; ?>">
                            <input type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <form action="booking_add.php" method="post">
            <input type="hidden" name="action" value="book_new">
            <input class="submit-button" type="submit" value="Book New Bus">
        </form>
        
        <form action="logout.php" method="post">
            <input type="hidden" name="action" value="log_out">
            <input class="submit-button" type="submit" value="Logout">
        </form>

    </div>
</body>
</html>

<?php include '../view/footer.php'; ?>
