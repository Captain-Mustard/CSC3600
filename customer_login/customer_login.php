<?php include '../view/header.php'; ?>

<main>
    <div class="container">
        <h2>Rider Login</h2>

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

        <!-- Display a search form -->
        <div class="form-container">
            <form action="." method="post">
                <label for="uni_id">University ID:</label>
                <input type="text" id="uni_id" name="uni_id" value="" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="" required>

                <input type="hidden" name="action" value="logged_in">
                <input type="submit" class="submit-button" value="Login">
            </form>
        </div>

        <div class="form-container">
            <form action="." method="post">
                <input type="hidden" name="action" value="create_user">
                <input type="submit" class="submit-button" value="Create New User">
            </form>
        </div>
    </div>

    <?php include '../view/footer.php'; ?>
</main>