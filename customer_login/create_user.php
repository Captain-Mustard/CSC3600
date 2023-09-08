<?php include '../view/header.php'; ?>
<main>

    <h2>Create User</h2>
		
    <!--  -->
    <form action="." method="post">
        <label>University ID:</label>
        <input type="text" name="uni_id"><br>

        <!-- make drop down -->
		<label>Role:</label>
        <select name="role">
			<option value="Student">Student</option>
			<option value="Staff">Staff</option>
		</select><br>

        <label>Email:</label>
        <input type="text" name="email"><br>

        <label>Password:</label>
        <input type="password" name="password" />
        <label class="password"></label><br>
		
		
		
		
		<input type="hidden" name="action" value="user_created">
                
		<input type="submit" value="Create User">
		
		
    </form>
	
	
<?php include '../view/footer.php'; ?>
	
</main>