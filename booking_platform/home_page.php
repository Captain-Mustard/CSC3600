<?php include '../view/header.php'; ?>

<?php
#Had bugs when trying to echo the sql values, hard-coded for now, will fix later.
echo "Bookings: ";
echo"Today's Date:";
echo "<table border='1' width='800px'>";
	echo"<tr>";
		echo "<th>Trip ID</th>";
		echo "<th>Time</th>";
		echo "<th>Bus No.</th>";
		echo "<th>Start Dest.</th>";
		echo "<th>End Dest.</th>";
		echo "<th>Start Time</th>";
		echo "<th>End Time</th>";
		echo "<th>Passenger List</th>";
	echo"</tr>";
	for ($i = 0;$i<=10;$i++){
		echo"<tr>";
		echo"<td>$i</td>";
		echo"<td>time</td>";
		echo"<td>bus</td>";
		echo"<td>startdest</td>";
		echo"<td>enddest</td>";
		echo"<td>starttime</td>";
		echo"<td>endtime</td>";
		## Error -> Button below not working.
		echo'<td><button type="button" onclick="location.href="../driver_platform/list_passengers.php"">View Passengers</button></td>';
		echo"<tr>";
	}
?>


<?php

?>


	<form>
			
			<input type="hidden" name="action" value="log_out">
					
				<input type="submit" value="Logout">
		
		</form>



<?php include '../view/footer.php'; ?>



