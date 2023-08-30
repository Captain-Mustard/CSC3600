<?php
# passenger login
function get_passenger($uni_id) {
    global $db;
    $query = 'SELECT * FROM Passengers
              WHERE unisqId = :uni_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $passenger = $statement->fetch();
    $statement->closeCursor();
    return $passenger;
}

/* Still working progress*/

# validates user login 
function login_check($username, $password) {
    global $db;
    $query = 'SELECT unisq_Id FROM Passengers
			 WHERE unisqId = :user_name AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $username);
	$statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
   
}


# lets passengers accounts be created - password must be hashed by php before being entered
function add_passenger($uni_id, $role, $email, $password) {
    global $db;
    $query = 'INSERT INTO Passengers
                 (unisqId, role, email, password)
              VALUES
                 (:uni_id, :role, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':uni_id', $uni_id);
    $statement->bindValue(':role', $role);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

# driver login
function get_driver_login($driver_username, $password) {
    global $db;
    $query = 'SELECT * FROM BusDriver
              WHERE driverUsername = :driver_username AND password = :password';
    $statement = $db->prepare($query);
    $statement->execute();
    $driver = $statement->fetch();
    $statement->closeCursor();
    return $driver;
}

# metrics account login

function get_metrics_account($metric_username, $password) {
    global $db;
    $query = 'SELECT * FROM MetricsLogin
              WHERE username = :metric_username AND password = :password';
    $statement = $db->prepare($query);
    $statement->execute();
    $metric_login = $statement->fetch();
    $statement->closeCursor();
    return $metric_login;
}


?>