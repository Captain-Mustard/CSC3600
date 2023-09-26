<?php
include '../view/header.php';

// Initialize variables with default values
$uni_id = '';
$role = '';
$email = '';
$password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    if (isset($_POST['uni_id'])) {
        $uni_id = $_POST['uni_id'];
    }
    if (isset($_POST['role'])) {
        $role = $_POST['role'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }
}
?>

<main>
    <div class="container">
        <h2>Create User</h2>
        <div class="form-container">
            <form name="userForm" action="." method="post" onsubmit="return validateForm();" class="user-form">
                <div class="form-group">
                    <label for="uni_id">University ID:</label>
                    <input type="text" id="uni_id" name="uni_id" value="<?php echo htmlspecialchars($uni_id); ?>" required>
                    <!-- Error message placeholder -->
                    <span id="uni_id_error" class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" name="role" class="select-field">
                        <option value="Student" <?php if ($role === 'Student') echo 'selected'; ?>>Student</option>
                        <option value="Staff" <?php if ($role === 'Staff') echo 'selected'; ?>>Staff</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    <!-- Error message placeholder -->
                    <span id="email_error" class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required>
                    <!-- Error message placeholder -->
                    <span id="password_error" class="error-message"></span>
                </div>

                <input type="hidden" name="action" value="user_created">
                <input type="submit" class="submit-button" value="Create User">
            </form>
        </div>
    </div>
</main>

<?php include '../view/footer.php'; ?>
