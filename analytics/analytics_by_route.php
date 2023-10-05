<?php include '../view/header.php'; ?>
<main>
    <nav>
  <h1>View Analytics by Route:</h1>
  
</br>



<form method="post">
<div class="box-analytics-child">
    <p>Last 7 Days by Routes:</p>
       <label for="destination">Route End:</label>
        <select id="destination" name="end">
            <option selected disabled>-- select --</option>
            <option value="Toowoomba">Toowoomba</option>
            <option value="Springfield">Springfield</option>
            <option value="Springfield Central">Springfield Central</option>
            <option value="Ipswich">Ipswich</option>
            <option value="Plainland">Plainland</option>
        </select>
            <input type="hidden" name="submit_day"/>
</div>
</div>
<br>
 

      
		  <input type="hidden" name="action" value="last_7_routes">
        <input type="submit" value="Last 7 Days by route">
	  <br><br>
</form>	


<form method="post">
<div class="box-analytics-child">
    <p>Last 30 Days by Routes:</p>
       <label for="destination">Route End:</label>
        <select id="destination" name="end">
            <option selected disabled>-- select --</option>
            <option value="Toowoomba">Toowoomba</option>
            <option value="Springfield">Springfield</option>
            <option value="Springfield Central">Springfield Central</option>
            <option value="Ipswich">Ipswich</option>
            <option value="Plainland">Plainland</option>
        </select>
            <input type="hidden" name="submit_day"/>
</div>
</div>
<br>
 

      
		  <input type="hidden" name="action" value="last_30_routes">
        <input type="submit" value="Last 30 Days by route">
	  <br><br>
</form>	
	
<form method="post">
<div class="box-analytics-child">
    <p>Next 7 Days by Routes:</p>
       <label for="destination">Route End:</label>
        <select id="destination" name="end">
            <option selected disabled>-- select --</option>
            <option value="Toowoomba">Toowoomba</option>
            <option value="Springfield">Springfield</option>
            <option value="Springfield Central">Springfield Central</option>
            <option value="Ipswich">Ipswich</option>
            <option value="Plainland">Plainland</option>
        </select>
            <input type="hidden" name="submit_day"/>
</div>
</div>
<br>
 

      
		  <input type="hidden" name="action" value="next_7_routes">
        <input type="submit" value="Next 7 Days by route">
	  <br><br>
</form>		

    
<form method="post">
<div class="box-analytics-child">
    <p>Next 30 Days by Routes:</p>
       <label for="destination">Route End:</label>
        <select id="destination" name="end">
            <option selected disabled>-- select --</option>
            <option value="Toowoomba">Toowoomba</option>
            <option value="Springfield">Springfield</option>
            <option value="Springfield Central">Springfield Central</option>
            <option value="Ipswich">Ipswich</option>
            <option value="Plainland">Plainland</option>
        </select>
            <input type="hidden" name="submit_day"/>
</div>
</div>
<br>
 

      
		  <input type="hidden" name="action" value="next_30_routes">
        <input type="submit" value="Next 30 Days by route">
	  <br><br>
</form>		
    
	
	
    <br><br><br>
  
	<form>
	
        <input type="hidden" name="action" value="analytics">
        <input type="submit" value="Back">
		<br><br>
</form>
    
</main>
</div>
</div>
<?php include '../view/footer.php'; ?>