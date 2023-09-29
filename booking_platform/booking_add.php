<?php
include '../view/header.php';
require('../model/database.php');
session_start();
?>

<html>
<head>
    <title>Bus Booking</title>
</head>
<body>
    <h1>Bus Booking</h1>
    <form method="post" action="book_bus.php">
        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="departure">Select Departure Point:</label>
        <select id="departure" name="departure" required>
            <option value="Toowoomba">Toowoomba</option>
            <option value="Springfield">Springfield</option>
        </select><br><br>

        <label for="startTime">Select Start Time:</label>
        <select id="startTime" name="startTime" required>
            <?php
            // Define the available start times based on the selected departure point
            $startTimes = ($_POST['departure'] == 'Toowoomba')
                ? ['06:30', '10:00', '13:15', '16:15']
                : ['06:45', '10:00', '13:15', '16:15'];

            // Generate the options for start times
            foreach ($startTimes as $time) {
                echo "<option value=\"$time\">$time</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" value="Book Trip">
    </form>

    <form action="logout.php" method="post">
        <input type="hidden" name="action" value="log_out">
        <input class="submit-button" type="submit" value="Logout">
    </form>
</body>
</html>

<?php include '../view/footer.php'; ?>
