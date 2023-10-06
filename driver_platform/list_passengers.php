<div class="container">
    <h1>
        Passengers on Bus <?php echo htmlspecialchars($busNo); ?> to <?php echo htmlspecialchars($destination); ?>
        Departing <?php echo htmlspecialchars($busTime); ?>
    </h1>
    <table>
        <tr>
            <th>UniSQ ID</th>
            <th>Passenger Type</th>
            <th>Off Time</th>
            <th>Finished</th>
            <th>Action</th>
        </tr>
        <?php foreach ($passengers_on_trips as $passenger) : ?>
            <tr>
                <td><?php echo htmlspecialchars($passenger['unisqId']); ?></td>
                <td><?php echo htmlspecialchars($passenger['role']); ?></td>
                <td>
                    <?php
                    // Display the off time, if available
                    echo ($passenger['offTime'] !== null) ? date('h:i A', strtotime(htmlspecialchars($passenger['offTime']))) : '';
                    ?>
                </td>
                <td>
                    <?php
                    // Display "OFF" if the passenger is marked as finished
                    echo (htmlspecialchars($passenger['finished']) === '0') ? 'OFF' : '';
                    ?>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="passenger_marked_off">
                        <input type="hidden" name="uni_id" value="<?php echo htmlspecialchars($passenger['unisqId']); ?>">
                        <input type="hidden" name="off_time" value="<?php echo date('Y-m-d H:i:s'); ?>"> <!-- Current time -->
                        <input type="hidden" name="trip_id" value="<?php echo htmlspecialchars($passenger['tripId']); ?>">
                        <input type="hidden" name="schedule_id" value="<?php echo htmlspecialchars($passenger['scheduleId']); ?>">
                        <input type="hidden" name="busNo" value="<?php echo htmlspecialchars($busNo); ?>">
                        <input type="hidden" name="bus_time" value="<?php echo htmlspecialchars($busTime); ?>">
                        <input type="hidden" name="destination" value="<?php echo htmlspecialchars($destination); ?>">
                        <input type="submit" value="Offload Passenger">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <form action="list_busses.php" method="get">
        <input type="submit" value="Back to Bus List">
    </form>
    <form action="new_booking_temp.php">
        <input class="button" type="submit" value="Create New Booking"/>
    </form>
</div>
