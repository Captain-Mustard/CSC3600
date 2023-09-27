<?php include '../view/header.php'; ?>
<main>
  <h1>View Analytics by Route or Day:</h1>
  <p>Select a Route or Day of Week:</p>
    <!-- display -->

    <form action="." method="post">
        <label for="destination">Route:</label>
        <br />
        <label for="destination">Start:</label>
        <select id="destination" name="destination">
            <option value="Toowoomba">Toowoomba</option>
            <option value="Springfield">Springfield</option>
            <option value="Springfield Central">Springfield Central</option>
            <option value="Ipswich">Ipswich</option>
            <option value="Plainland">Plainland</option>
        </select>

        <br />
        <label for="destination">End:</label>
        <select id="destination" name="destination">
            <option value="Toowoomba">Toowoomba</option>
            <option value="Springfield">Springfield</option>
            <option value="Springfield Central">Springfield Central</option>
            <option value="Ipswich">Ipswich</option>
            <option value="Plainland">Plainland</option>
        </select>


        <!--<select> #Can do a JS for loop to print same drop-down twice instead of repeating above.
            <script>document.write </script>
        
        </select>-->

        <br /> </br />
        <label for="day">Day:</label>
        <select id="day" name="day">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
        </select> <br />
        <p>Select to View:</p>
        <input type="hidden" name="action" value="next_7_days">
        <input type="submit" value="Next 7 Days">

        <input type="hidden" name="action" value="past_7_days">
        <input type="submit" value="Past 7 Days">

        <input type="hidden" name="action" value="past_30_days">
        <input type="submit" value="Past 30 Days">
    </form>
<br/>
	 <form>
		
		  <input type="hidden" name="action" value="log_out">
			<input type="submit" value="Logout">
	
	</form>
</main>
<?php include '../view/footer.php'; ?>