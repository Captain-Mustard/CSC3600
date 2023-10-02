<?php include '../view/header.php'; ?>

<main>
    <div class="container">
        <h2>Driver Login</h2>

        <?php
        // Check if an error message is set
        if (isset($error)) {
            echo '<div class="error-message">' . htmlspecialchars($error) . '</div>';
        }
        ?>

        <!-- Display a login form -->
        <div class="form-container">
            <form action="." method="post">
                <label for="driver_id">Driver Username:</label>
                <input type="text" id="driver_id" name="driver_id" value="" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="" required>

                <input type="hidden" name="action" value="logged_in">
                <input type="submit" class="submit-button" value="Login">
            </form>
        </div>
    </div>

    <?php include '../view/footer.php'; ?>
</main>
