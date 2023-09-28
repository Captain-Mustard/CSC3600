<?php include '../view/header.php'; 




?>



<main>
    <div class="container">
        <h2>Administrator Login</h2>

        <?php
        // Check if a success message is set in the session
        if (isset($_SESSION['success_message'])) {
            // Display the success message
            echo '<div class="success-message">' . htmlspecialchars($_SESSION['success_message']) . '</div>';

            // Clear the success message from the session to prevent it from displaying again on refresh
            unset($_SESSION['success_message']);
        }

        // Check if an error message is set
        if (isset($error)) {
            echo '<div class="error-message">' . htmlspecialchars($error) . '</div>';
        }
        ?>

        <!-- Display a login form -->
        <div class="form-container">
            <form action="index.php" method="post" onsubmit="return validateForm()" class="user-form">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required class="input-field">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required class="input-field">
                </div>

                <input type="hidden" name="action" value="logged_in">

                <input type="submit" value="Login" class="submit-button">
            </form>
        </div>
    </div>
</main>

<script>
    function validateForm() {
        document.getElementById('error_message').textContent = '';

        let username = document.forms['userForm']['username'].value;
        let password = document.forms['userForm']['password'].value;

        let isValid = true;

        if (username.trim() === '' || password.trim() === '') {
            document.getElementById('error_message').textContent = 'Please enter both username and password.';
            isValid = false;
        }

        return isValid;
    }
</script>

<?php include '../view/footer.php'; ?>
