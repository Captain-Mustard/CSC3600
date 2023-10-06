<?php
// Generate a hashed password using the PASSWORD_DEFAULT algorithm
$make_hashed_password = password_hash("test1", PASSWORD_DEFAULT);

// Output the hashed password
echo $make_hashed_password;
?>
