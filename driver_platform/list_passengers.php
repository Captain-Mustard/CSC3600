<?php include '../view/header.php'; ?>
<h1>Passengers on Current Trip</h1>
    <!-- display a table of product -->
    <table>
        <tr>
            <th>UniSQ ID: </th>
            <th>Passenger Type: </th>
			
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($passengers_on_trips as $passengers_on_trip) : ?>
        <tr>
            <td><?php echo htmlspecialchars($passengers_on_trip['unisqId']); ?></td>
            <td><?php echo htmlspecialchars($passengers_on_trip['role']); ?></td>
			<td><?php echo htmlspecialchars($passengers_on_trip['finished']); ?></td>

                <td><form action="." method="post">

                <input type="hidden" name="uni_id"
                value="<?php echo htmlspecialchars($passengers_on_trip['unisqId']);?>">

                <input type="hidden" name="off_time"
                value="<?php echo htmlspecialchars($passengers_on_trip['offTime']);?>">

                <input type="hidden" name="trip_id"
                value="<?php echo htmlspecialchars($passengers_on_trip['tripId']);?>">
              
                <input type="hidden" name="action"
                       value="passenger_marked_off">


            <input type="submit" value="Check Off Bus">
                 
                
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>



    <form action="../booking_platform/new_booking.html" method="post">
                <input type="submit" value="Create New Booking:">
    </form>
	
<?php include '../view/footer.php'; ?>