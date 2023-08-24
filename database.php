<?php
    $dsn = 'mysql:host=localhost;dbname=shuttle_bus';
    $username = 'sb_user';
    $password = 'Jackal';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        
        exit();
    }
?>