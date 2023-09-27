<!DOCTYPE html>
<html>
<head>
    <title>Login Debug Page - remove_booking.php</title>
</head>
<body>
    <h1>Login Debug Page</h1>
    <p>Session Information:</p>
    <pre>
        <?php
        session_start();
        print_r($_SESSION);
        ?>
    </pre>
</body>
</html>