<?php include '../view/header.php'; ?>
<main>
    <!-- basic output of the drivers page, lets them choose what day direction the bus heads in -->
	<h2>Driver Page</h2>
    <p>Driver Tools</p>
    <form action="." method="post">
		<label for="destination">Choose a destination:</label>

			<select id="destination" name="destination">
				<option value="toowoomba">Toowoomba</option>
				<option value="Springfield">Springfield</option>
			</select>
			 <input type="hidden" name="action" value="list_busses">
			</br>
			<label for="day">Choose a day:</label>
			<input type="date"/>

			<input type="submit" value="Go">
	</form>
	<!-- logout button -->
    <form>
		
		  <input type="hidden" name="action" value="log_out">
                
			<input type="submit" value="Logout">
	
	</form>
</main>
<?php include '../view/footer.php'; ?>