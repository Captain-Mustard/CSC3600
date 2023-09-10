<?php include '../view/header.php'; ?>
<link href="/public/include/css/modern/user-logon.css?cg_code=63e43819fb9d41a4a0a81a382d83dee5&amp;cg_name=HCXdR5X-bywgdXqJMcVmsJIucjYQQBjMvCQPtNRlgN37UbpntoDUdjlajdlpQjdl" rel="stylesheet" type="text/css">

<style>
	<?php include '../main.css';?>
</style>

<main>

    <h2>Analytics Login</h2>
		
    <!-- display a search form -->
    <form action="." method="post">
        <label for="username">Username:</label>
			<input type="text" id="username" name="username" 
			value="" required>
		
		<label for="password">Password:</label>
			<input type="password" id="password" name="password" 
			value="" required>
		
		
		
		
			<input type="hidden" name="action" value="logged_in">
                
			<input type="submit" value="Login">
    </form>
	

	
<?php include '../view/footer.php'; ?>
	
</main>
