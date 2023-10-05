<?php
require('../model/database.php');
require('../model/analytics.php');
include '../view/header.php';

// Get user input from analytics_home.php
$destination = $_POST['destination']; // Replace with the actual input name
$day = $_POST['day']; // Replace with the actual input name

// Function 1: Get bookings by route for the next 7 days
$nextWeekBookingsByRoute = get_next_week_bookings_by_routes($destination);

// Function 2: Get bookings by route for the next 30 days
$nextMonthBookingsByRoute = get_next_month_bookings_by_routes($destination);

// Function 3: Get next week's bookings by day
$nextWeekBookingsByDay = get_next_week_bookings_by_day($day);

// Function 4: Get next month's bookings by day
$nextMonthBookingsByDay = get_next_month_bookings_by_day($day);

// Function 5: Get last week's bookings by route
$lastWeekBookingsByRoute = get_last_week_bookings_by_routes($destination);

// Function 6: Get last month's bookings by route
$lastMonthBookingsByRoute = get_last_month_bookings_by_routes($destination);

// Function 7: Get last week's bookings by day
$lastWeekBookingsByDay = get_last_week_bookings_by_day($day);

// Function 8: Get last month's bookings by day
$lastMonthBookingsByDay = get_last_month_bookings_by_day($day);

// Function 9: Get last week's passenger count
$lastWeekPassengerCount = get_last_week_passenger_count();

// Function 10: Get last month's passenger count
$lastMonthPassengerCount = get_last_month_passenger_count();

// Function 11: Get next week's passenger count
$nextWeekPassengerCount = get_next_week_passenger_count();

// Function 12: Get next month's passenger count
$nextMonthPassengerCount = get_next_month_passenger_count();
?>

<main>
    <div class="scroll-container">
        <div class="container">
            <!-- Display Function 1: Bookings by Route for the Next 7 Days -->
            <h2>Function 1: Bookings by Route for the Next 7 Days</h2>
            <table>
                <!-- Add table headers here -->
                <tr>
                    <th>Schedule ID</th>
                    <th>Trip Day</th>
                    <th>Bus Number</th>
                    <th>Bus Date</th>
                    <th>Bus Time</th>
                    <th>Start Location</th>
                    <th>Stop Location</th>
                    <th>Number of Bookings</th>
                </tr>
                <?php foreach ($nextWeekBookingsByRoute as $booking) { ?>
                    <!-- Display booking data here -->
                    <tr>
                        <td><?php echo $booking['scheduleId']; ?></td>
                        <td><?php echo $booking['tripDay']; ?></td>
                        <td><?php echo $booking['busNumber']; ?></td>
                        <td><?php echo $booking['busDate']; ?></td>
                        <td><?php echo $booking['busTime']; ?></td>
                        <td><?php echo $booking['startLocation']; ?></td>
                        <td><?php echo $booking['stopLocation']; ?></td>
                        <td><?php echo $booking['numberOfBookings']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="container">
            <!-- Display Function 2: Bookings by Route for the Next 30 Days -->
            <h2>Function 2: Bookings by Route for the Next 30 Days</h2>
            <table>
                <!-- Add table headers here -->
                <tr>
                    <th>Schedule ID</th>
                    <th>Trip Day</th>
                    <th>Bus Number</th>
                    <th>Bus Date</th>
                    <th>Bus Time</th>
                    <th>Start Location</th>
                    <th>Stop Location</th>
                    <th>Number of Bookings</th>
                </tr>
                <?php foreach ($nextMonthBookingsByRoute as $booking) { ?>
                    <!-- Display booking data here -->
                    <tr>
                        <td><?php echo $booking['scheduleId']; ?></td>
                        <td><?php echo $booking['tripDay']; ?></td>
                        <td><?php echo $booking['busNumber']; ?></td>
                        <td><?php echo $booking['busDate']; ?></td>
                        <td><?php echo $booking['busTime']; ?></td>
                        <td><?php echo $booking['startLocation']; ?></td>
                        <td><?php echo $booking['stopLocation']; ?></td>
                        <td><?php echo $booking['numberOfBookings']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Display Function 3: Next week's bookings by day -->
        <div class="container">
            <!-- Display Function 3: Next Week's Bookings by Day -->
            <h2>Function 3: Next Week's Bookings by Day</h2>
            <table>
                <!-- Add table headers here -->
                <tr>
                    <th>Schedule ID</th>
                    <th>Trip Day</th>
                    <th>Bus Number</th>
                    <th>Bus Date</th>
                    <th>Bus Time</th>
                    <th>Start Location</th>
                    <th>Stop Location</th>
                    <th>Number of Bookings</th>
                </tr>
                <?php foreach ($nextWeekBookingsByDay as $booking) { ?>
                    <!-- Display booking data here -->
                    <tr>
                        <td><?php echo $booking['scheduleId']; ?></td>
                        <td><?php echo $booking['tripDay']; ?></td>
                        <td><?php echo $booking['busNumber']; ?></td>
                        <td><?php echo $booking['busDate']; ?></td>
                        <td><?php echo $booking['busTime']; ?></td>
                        <td><?php echo $booking['startLocation']; ?></td>
                        <td><?php echo $booking['stopLocation']; ?></td>
                        <td><?php echo $booking['numberOfBookings']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Display Function 4: Next month's bookings by day -->
        <div class="container">
            <!-- Display Function 4: Next Month's Bookings by Day -->
            <h2>Function 4: Next Month's Bookings by Day</h2>
            <table>
                <!-- Add table headers here -->
                <tr>
                    <th>Schedule ID</th>
                    <th>Trip Day</th>
                    <th>Bus Number</th>
                    <th>Bus Date</th>
                    <th>Bus Time</th>
                    <th>Start Location</th>
                    <th>Stop Location</th>
                    <th>Number of Bookings</th>
                </tr>
                <?php foreach ($nextMonthBookingsByDay as $booking) { ?>
                    <!-- Display booking data here -->
                    <tr>
                        <td><?php echo $booking['scheduleId']; ?></td>
                        <td><?php echo $booking['tripDay']; ?></td>
                        <td><?php echo $booking['busNumber']; ?></td>
                        <td><?php echo $booking['busDate']; ?></td>
                        <td><?php echo $booking['busTime']; ?></td>
                        <td><?php echo $booking['startLocation']; ?></td>
                        <td><?php echo $booking['stopLocation']; ?></td>
                        <td><?php echo $booking['numberOfBookings']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Display Function 5: Last week's bookings by route -->
        <div class="container">
            <!-- Display Function 5: Last Week's Bookings by Route -->
            <h2>Function 5: Last Week's Bookings by Route</h2>
            <table>
                <!-- Add table headers here -->
                <tr>
                    <th>Schedule ID</th>
                    <th>Trip Day</th>
                    <th>Bus Number</th>
                    <th>Bus Date</th>
                    <th>Bus Time</th>
                    <th>Start Location</th>
                    <th>Stop Location</th>
                    <th>Number of Bookings</th>
                </tr>
                <?php foreach ($lastWeekBookingsByRoute as $booking) { ?>
                    <!-- Display booking data here -->
                    <tr>
                        <td><?php echo $booking['scheduleId']; ?></td>
                        <td><?php echo $booking['tripDay']; ?></td>
                        <td><?php echo $booking['busNumber']; ?></td>
                        <td><?php echo $booking['busDate']; ?></td>
                        <td><?php echo $booking['busTime']; ?></td>
                        <td><?php echo $booking['startLocation']; ?></td>
                        <td><?php echo $booking['stopLocation']; ?></td>
                        <td><?php echo $booking['numberOfBookings']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Display Function 6: Last month's bookings by route -->
        <div class="container">
            <!-- Display Function 6: Last Month's Bookings by Route -->
            <h2>Function 6: Last Month's Bookings by Route</h2>
            <table>
                <!-- Add table headers here -->
                <tr>
                    <th>Schedule ID</th>
                    <th>Trip Day</th>
                    <th>Bus Number</th>
                    <th>Bus Date</th>
                    <th>Bus Time</th>
                    <th>Start Location</th>
                    <th>Stop Location</th>
                    <th>Number of Bookings</th>
                </tr>
                <?php foreach ($lastMonthBookingsByRoute as $booking) { ?>
                    <!-- Display booking data here -->
                    <tr>
                        <td><?php echo $booking['scheduleId']; ?></td>
                        <td><?php echo $booking['tripDay']; ?></td>
                        <td><?php echo $booking['busNumber']; ?></td>
                        <td><?php echo $booking['busDate']; ?></td>
                        <td><?php echo $booking['busTime']; ?></td>
                        <td><?php echo $booking['startLocation']; ?></td>
                        <td><?php echo $booking['stopLocation']; ?></td>
                        <td><?php echo $booking['numberOfBookings']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Display Function 7: Last week's bookings by day -->
        <div class="container">
            <!-- Display Function 7: Last Week's Bookings by Day -->
            <h2>Function 7: Last Week's Bookings by Day</h2>
            <table>
                <!-- Add table headers here -->
                <tr>
                    <th>Schedule ID</th>
                    <th>Trip Day</th>
                    <th>Bus Number</th>
                    <th>Bus Date</th>
                    <th>Bus Time</th>
                    <th>Start Location</th>
                    <th>Stop Location</th>
                    <th>Number of Bookings</th>
                </tr>
                <?php foreach ($lastWeekBookingsByDay as $booking) { ?>
                    <!-- Display booking data here -->
                    <tr>
                        <td><?php echo $booking['scheduleId']; ?></td>
                        <td><?php echo $booking['tripDay']; ?></td>
                        <td><?php echo $booking['busNumber']; ?></td>
                        <td><?php echo $booking['busDate']; ?></td>
                        <td><?php echo $booking['busTime']; ?></td>
                        <td><?php echo $booking['startLocation']; ?></td>
                        <td><?php echo $booking['stopLocation']; ?></td>
                        <td><?php echo $booking['numberOfBookings']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Display Function 8: Last month's bookings by day -->
        <div class="container">
            <!-- Display Function 8: Last Month's Bookings by Day -->
            <h2>Function 8: Last Month's Bookings by Day</h2>
            <table>
                <!-- Add table headers here -->
                <tr>
                    <th>Schedule ID</th>
                    <th>Trip Day</th>
                    <th>Bus Number</th>
                    <th>Bus Date</th>
                    <th>Bus Time</th>
                    <th>Start Location</th>
                    <th>Stop Location</th>
                    <th>Number of Bookings</th>
                </tr>
                <?php foreach ($lastMonthBookingsByDay as $booking) { ?>
                    <!-- Display booking data here -->
                    <tr>
                        <td><?php echo $booking['scheduleId']; ?></td>
                        <td><?php echo $booking['tripDay']; ?></td>
                        <td><?php echo $booking['busNumber']; ?></td>
                        <td><?php echo $booking['busDate']; ?></td>
                        <td><?php echo $booking['busTime']; ?></td>
                        <td><?php echo $booking['startLocation']; ?></td>
                        <td><?php echo $booking['stopLocation']; ?></td>
                        <td><?php echo $booking['numberOfBookings']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Display Function 9: Last week's passenger count -->
        <div class="container">
            <!-- Display Function 9: Last Week's Passenger Count -->
            <h2>Function 9: Last Week's Passenger Count</h2>
            <table>
                <tr>
                    <th>Total Trips</th>
                </tr>
                <tr>
                    <td><?php echo $lastWeekPassengerCount['totalTrips']; ?></td>
                </tr>
            </table>
        </div>

        <!-- Display Function 10: Last month's passenger count -->
        <div class="container">
            <!-- Display Function 10: Last Month's Passenger Count -->
            <h2>Function 10: Last Month's Passenger Count</h2>
            <table>
                <tr>
                    <th>Total Trips</th>
                </tr>
                <tr>
                    <td><?php echo $lastMonthPassengerCount['totalTrips']; ?></td>
                </tr>
            </table>
        </div>

        <!-- Display Function 11: Next week's passenger count -->
        <div class="container">
            <!-- Display Function 11: Next Week's Passenger Count -->
            <h2>Function 11: Next Week's Passenger Count</h2>
            <table>
                <tr>
                    <th>Total Trips</th>
                </tr>
                <tr>
                    <td><?php echo $nextWeekPassengerCount['totalTrips']; ?></td>
                </tr>
            </table>
        </div>

        <!-- Display Function 12: Next month's passenger count -->
        <div class="container">
            <!-- Display Function 12: Next Month's Passenger Count -->
            <h2>Function 12: Next Month's Passenger Count</h2>
            <table>
                <tr>
                    <th>Total Trips</th>
                </tr>
                <tr>
                    <td><?php echo $nextMonthPassengerCount['totalTrips']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</main>

<?php // include '../view/footer.php'; ?>
