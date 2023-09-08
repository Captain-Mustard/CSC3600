<?php
    $dsn = 'mysql:host=localhost;dbname=shuttle_bus';
    $username = 'db_user';
    $password = 'secure';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>