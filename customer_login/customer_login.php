

<style>
	
</style>

<main>

    <h2>User Login</h2>
		
    <!-- display a search form -->
    <form action="." method="post">
        <label for="uni_id">University ID:</label>
			<input type="text" id="uni_id" name="uni_id" 
			value="" required>
		
		<label for="password">Password:</label>
			<input type="password" id="password" name="password" 
			value="" required>
		
		
		
		
			<input type="hidden" name="action" value="logged_in">
                
			<input type="submit" value="Login">
    </form>
	
	<form>
		
		  <input type="hidden" name="action" value="create_user">
                
			<input type="submit" value="Login">
	
	</form>
	
	<?php  //to hash the password
	
		//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	
	?>
	
</main>
