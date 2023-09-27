<!DOCTYPE html>
<html>
<head>
    <title>Login Debug Page1</title>
</head>
<body>
    <h1>Login Debug Page - From Booking_Display.PHP</h1>
    <p>Session Information:</p>
    <pre>
        <?php
        session_start();
        print_r($_SESSION);
        ?>
    </pre>
</body>
</html>