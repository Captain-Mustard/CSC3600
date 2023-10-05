<?php
require('../model/database.php');
require('../model/bus_trips.php'); // Include the updated bus_trips.php

// Get the current local date in the format 'YYYY-MM-DD'
$currentDate = date('Y-m-d');

// Convert the current date to the day of the week (e.g., 'Monday', 'Tuesday', etc.)
$dayOfWeek = date('l', strtotime($currentDate));

// Get the Springfield timetable for the selected day
$springfieldTrips = get_springfield_timetable_by_day($dayOfWeek);

// Get the Toowoomba timetable for the selected day
$toowoombaTrips = get_toowoomba_timetable_by_day($dayOfWeek);

include '../view/header.php';
?>

<link rel="stylesheet" type="text/css" href="../main.css">

<div class="container">
    <h1>Todays Trips</h1>

    <h2>Springfield Bound Buses</h2>
    <!-- Display a table of Springfield-bound buses -->
    <table>
        <tr>
            <th>Bus No.</th>
            <th>Departure Point</th>
            <th>Departure Time</th>
            <th>Plainland</th>
            <th>Ipswich</th>
            <th>Springfield Central</th>
            <th>Springfield</th>
            <th>Passengers</th>
        </tr>
        <?php foreach ($springfieldTrips as $trip) : ?>
            <tr>
                <td><?php echo htmlspecialchars($trip['busNo']); ?></td>
                <td><?php echo htmlspecialchars($trip['startStop']); ?></td>
                <td><?php echo date('h:i A', strtotime($trip['stopOneTime'])); ?></td>
                <td><?php echo date('h:i A', strtotime($trip['stopTwoTime'])); ?></td>
                <td><?php echo date('h:i A', strtotime($trip['stopThreeTime'])); ?></td>
                <td><?php echo date('h:i A', strtotime($trip['stopFourTime'])); ?></td>
                <td><?php echo date('h:i A', strtotime($trip['stopFiveTime'])); ?></td>
                <td>
                    <form action="listPassengers.php" method="post">
                        <input type="hidden" name="busNo" value="<?php echo htmlspecialchars($trip['busNo']); ?>">
                        <input type="hidden" name="bus_time" value="<?php echo htmlspecialchars($trip['stopOneTime']); ?>">
                        <input type="hidden" name="destination" value="<?php echo htmlspecialchars($trip['finishStop']); ?>">
                        <input type="submit" value="Get Passengers">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Toowoomba Bound Buses</h2>
    <!-- Display a table of Toowoomba-bound buses -->
    <table>
        <tr>
            <th>Bus No.</th>
            <th>Departure Point</th>
            <th>Departure Time</th>
            <th>Ipswich</th>
            <th>Plainland</th>
            <th>Toowoomba</th>
            <th>Passengers</th>
        </tr>
        <?php foreach ($toowoombaTrips as $trip) : ?>
            <tr>
                <td><?php echo htmlspecialchars($trip['busNo']); ?></td>
                <td><?php echo htmlspecialchars($trip['startStop']); ?></td>
                <td><?php echo date('h:i A', strtotime($trip['stopOneTime'])); ?></td>
                <td><?php echo date('h:i A', strtotime($trip['stopTwoTime'])); ?></td>
                <td><?php echo date('h:i A', strtotime($trip['stopThreeTime'])); ?></td>
                <td><?php echo date('h:i A', strtotime($trip['stopFourTime'])); ?></td>
                <td>
                    <form action="listPassengers.php" method="post">
                        <input type="hidden" name="busNo" value="<?php echo htmlspecialchars($trip['busNo']); ?>">
                        <input type="hidden" name="bus_time" value="<?php echo htmlspecialchars($trip['stopOneTime']); ?>">
                        <input type="hidden" name="destination" value="<?php echo htmlspecialchars($trip['finishStop']); ?>">
                        <input type="submit" value="Get Passengers">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form action="logout.php" method="post">
        <input type="hidden" name="action" value="log_out">
        <input class="submit-button" type="submit" value="Logout">
    </form>
</div>

<?php // include '../view/footer.php'; ?>
