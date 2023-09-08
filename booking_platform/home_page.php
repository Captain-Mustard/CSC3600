<?php
if ($action === NULL AND isset($_SESSION['loggedin']) == FALSE){
	
	header('Location: ../customer_login/');
}

// display bookings



// new bookings
?>
<p>bookings:</p>
<form>
		
		  <input type="hidden" name="action" value="log_out">
                
			<input type="submit" value="Logout">
	
	</form>



