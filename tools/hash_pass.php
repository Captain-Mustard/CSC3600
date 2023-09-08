<?php

$make_hashed_password = password_hash("test1", PASSWORD_DEFAULT);

echo $make_hashed_password;

?>