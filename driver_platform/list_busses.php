<?php include '../view/header.php'; ?>
<h1>Todays Trips</h1>
    <!-- display a table of the days trips -->
    <table>
        <tr>
            <th>Bus Number: </th>
            <th>Springfield: </th>
			<th>Ipswich: </th>
			<th>Plainland: </th>
			<th>Toowoomba: </th>
            <th>Passengers: </th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($trips as $trip) : ?>
        <tr>
            <td><?php echo htmlspecialchars($trip['busNo']); ?></td>
            <td><?php echo htmlspecialchars($trip['stopOneTime']); ?></td>
			 <td><?php echo htmlspecialchars($trip['stopTwoTime']); ?></td>
            <td><?php echo htmlspecialchars($trip['stopThreeTime']); ?></td>
            <td><?php echo htmlspecialchars($trip['stopFourTime']); ?></td>
            <td><form action="." method="post">
                
				<input type="hidden" name="action"
                       value="get_passengers">
                
				<input type="hidden" name="bus_time"
                       value="<?php echo htmlspecialchars($trip['stopOneTime']); ?>">
			    
				<input type="hidden" name="destination"
                       value="<?php echo htmlspecialchars($trip['finishStop']); ?>">
					   
                <input type="submit" value="Get Passengers">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
	
<?php include '../view/footer.php'; ?>