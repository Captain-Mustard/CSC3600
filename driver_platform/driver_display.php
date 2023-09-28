<?php include '../view/header.php'; ?>
<main>
    <!-- basic output of the drivers page, lets them choose what day direction the bus heads in -->
    <form action="." method="post">
		<label for="destination">Choose a destination:</label>
		<select id="destination" name="destination">
				<option value="toowoomba">Toowoomba</option>
				<option value="Springfield">Springfield</option>
			</select>

			</br> </br>
			<label for="day">Choose a day:</label>
			<input type="date"/>

			<input type="hidden" name="action" value="list_busses">
			<input type="submit" value="Go">
</br>


	</form>
	<!-- logout button -->

    <form>

		  <input type="hidden" name="action" value="log_out">
                
			<input type="submit" value="Logout">
	
	</form>
</main>
<?php include '../view/footer.php'; ?>