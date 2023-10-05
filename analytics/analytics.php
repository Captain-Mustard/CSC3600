<?php include '../view/header.php'; ?>
<main>
    <nav>
  <?php $last_month_count = get_last_month_passenger_count(); 
		$next_month_count = get_next_month_passenger_count();
		$last_week_count = get_last_week_passenger_count(); 
		$next_week_count = get_next_week_passenger_count();
		
	?>
	
	<form>
	
	
        <input type="hidden" name="action" value="get_routes">
        <input type="submit" value="Analytics by Route">
		<br><br>
</form>

<form>
	
	
        <input type="hidden" name="action" value="get_day">
        <input type="submit" value="Analytics by Day">
		<br><br>
</form>
	
	<h2>total passengers last month:</h2>  <p><?= $last_month_count['totalTrips']; ?></p><br>
	<h2>total passengers this month:</h2>  <p><?= $next_month_count['totalTrips']; ?></p><br>
	<h2>total passengers last week:</h2>  <p><?= $last_week_count['totalTrips']; ?></p><br>
	<h2>total passengers this week:</h2>  <p><?= $next_week_count['totalTrips']; ?></p><br>
<br>
    	  
        <form> 	          <input type="hidden" name="action" value="log_out">
            	           <input class="submit-button" type="submit" value="Logout">
        </form>	       


</main>

<?php include '../view/footer.php'; ?>