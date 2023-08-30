

<style>
	
</style>

<main>

    <h2>Customer Login</h2>
		
    <!-- display a search form -->
    <form action="." method="post">
        <label for="uni_id">University ID:</label>
			<input type="text" id="uni_id" name="uni_id" 
			value="" required>
		
		<label for="password">Password:</label>
			<input type="text" id="password" name="password" 
			value="" required>
		
		
		
		
			<input type="hidden" name="action" value="login_customer">
                
			<input type="submit" value="Login">
    </form>
	
	<?php  //to hash the password
	
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	
	?>
	
</main>
