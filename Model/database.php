<?php
// Database connection settings
$dsn = 'mysql:host=localhost;dbname=shuttle_bus';
$username = 'db_user';
$password = 'secure';

try {
    // Attempt to create a PDO database connection
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    // If an exception (error) occurs during connection, handle it
    $error_message = $e->getMessage();

    // Include an error handling script (you may need to specify the correct path)
    include('../errors/database_error.php');

    // Exit the script to prevent further execution in case of a database error
    exit();
}
?>
