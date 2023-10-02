<?php include '../view/header.php'; ?>
<?php 
require('../model/database.php');
include('../model/analytics.php');?>
<link rel="stylesheet" type="text/css" href="../main.css">

<?php
function print_next_week_bookings_by_day($day) {
    $bookings = get_last_month_bookings_by_day($day);
    
    
    if (empty($bookings)) {
        echo "No bookings found for the next week on " . $day . ".";
        return;
    }

?><div class="container"><?php
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Schedule ID</th>";
    echo "<th>Trip Day</th>";
	 echo "<th>Trip Time</th>";
    echo "<th>Bus Number</th>";
    echo "<th>Bus Date</th>";
    echo "<th>Start Location</th>";
    echo "<th>Stop Location</th>";
    echo "<th>Number of Bookings</th>";
    echo "</tr>";

    foreach ($bookings as $booking) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($booking['scheduleId']) . "</td>";
        echo "<td>" . htmlspecialchars($booking['tripDay']) . "</td>";
		 echo "<td>" . htmlspecialchars($booking['busTime']) . "</td>";
        echo "<td>" . htmlspecialchars($booking['busNumber']) . "</td>";
        echo "<td>" . htmlspecialchars($booking['busDate']) . "</td>";
        echo "<td>" . htmlspecialchars($booking['startLocation']) . "</td>";
        echo "<td>" . htmlspecialchars($booking['stopLocation']) . "</td>";
        echo "<td>" . htmlspecialchars($booking['numberOfBookings']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    #Only prints passengerCount if Analytics viewed by day.
    if (isset($passengerCount)){
        echo "Passenger Count: ".htmlspecialchars($passengerCount);
    }
}

#print_next_week_bookings_by_day($day);

?></div>

<main>
<form action="../booking_platform/logout.php" method="post">
            <input type="hidden" name="action" value="log_out">
            <input class="submit-button" type="submit" value="Logout">
        </form>
    
</main>
<?php include '../view/footer.php'; ?>