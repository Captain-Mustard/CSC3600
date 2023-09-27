<?php

//gets the bookings by route for the next 7 days
function get_next_week_bookings_by_routes($destination) {
    global $db;
    $query = '
        SELECT b.scheduleId, s.tripDay, s.busNumber, s.busDate,  s.busTime,  s.startLocation, s.stopLocation, COUNT(b.tripId) as numberOfBookings
        FROM BusTrips AS b
        INNER JOIN BusSchedules AS s ON b.scheduleId = s.scheduleId
        WHERE s.busDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY) AND s.startLocation = :destination 
        GROUP BY b.scheduleId, s.tripDay, s.busNumber, s.busDate, s.startLocation, s.stopLocation
        ORDER BY s.busDate ASC';  

    $statement = $db->prepare($query);
    $statement->bindValue(':destination', $destination);
    $statement->execute();
    $next_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $next_week_bookings;
}

//gets the bookings by route for the next 30 days
function get_next_month_bookings_by_routes($destination) {
    global $db;
    $query = '
        SELECT b.scheduleId, s.tripDay, s.busNumber, s.busDate,  s.busTime,  s.startLocation, s.stopLocation, COUNT(b.tripId) as numberOfBookings
        FROM BusTrips AS b
        INNER JOIN BusSchedules AS s ON b.scheduleId = s.scheduleId
        WHERE s.busDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) AND s.startLocation = :destination 
        GROUP BY b.scheduleId, s.tripDay, s.busNumber, s.busDate, s.startLocation, s.stopLocation
        ORDER BY s.busDate ASC';  

    $statement = $db->prepare($query);
    $statement->bindValue(':destination', $destination);
    $statement->execute();
    $next_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $next_week_bookings;
}


//gets next weeks booking by day
function get_next_week_bookings_by_day($day) {
    global $db;
    $query = '
        SELECT b.scheduleId, s.tripDay, s.busNumber, s.busDate,  s.busTime,  s.startLocation, s.stopLocation, COUNT(b.tripId) as numberOfBookings
        FROM BusTrips AS b
        INNER JOIN BusSchedules AS s ON b.scheduleId = s.scheduleId
        WHERE s.busDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY) AND s.tripDay = :day 
        GROUP BY b.scheduleId, s.tripDay, s.busNumber, s.busDate, s.startLocation, s.stopLocation
        ORDER BY s.busDate ASC';  

    $statement = $db->prepare($query);
    $statement->bindValue(':day', $day);
    $statement->execute();
    $next_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $next_week_bookings;
}

//gets next months booking by day
function get_next_month_bookings_by_day($day) {
    global $db;
    $query = '
        SELECT b.scheduleId, s.tripDay, s.busNumber, s.busDate,  s.busTime,  s.startLocation, s.stopLocation, COUNT(b.tripId) as numberOfBookings
        FROM BusTrips AS b
        INNER JOIN BusSchedules AS s ON b.scheduleId = s.scheduleId
        WHERE s.busDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) AND s.tripDay = :day 
        GROUP BY b.scheduleId, s.tripDay, s.busNumber, s.busDate, s.startLocation, s.stopLocation
        ORDER BY s.busDate ASC';  

    $statement = $db->prepare($query);
    $statement->bindValue(':day', $day);
    $statement->execute();
    $next_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $next_week_bookings;
}


//gets previous 7 days per routes
function get_last_week_bookings_by_routes($destination){
	global $db;
    $query = '
            SELECT b.scheduleId, s.tripDay, s.busNumber, s.busDate,  s.busTime,  s.startLocation, s.stopLocation, COUNT(b.tripId) as numberOfBookings
            FROM BusTrips AS b
            INNER JOIN BusSchedules AS s ON b.scheduleId = s.scheduleId
            WHERE s.busDate BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() AND s.startLocation = :destination 
            GROUP BY b.scheduleId, s.tripDay, s.busNumber, s.busDate, s.startLocation, s.stopLocation
            ORDER BY s.busDate DESC';
    $statement = $db->prepare($query);
	$statement->bindValue(':destination', $destination);
	$statement->execute();
    $last_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $last_week_bookings;
}
// routes previous 30 days
function get_last_month_bookings_by_routes($destination){
	global $db;
    $query = '
            SELECT b.scheduleId, s.tripDay, s.busNumber, s.busDate,  s.busTime,  s.startLocation, s.stopLocation, COUNT(b.tripId) as numberOfBookings
            FROM BusTrips AS b
            INNER JOIN BusSchedules AS s ON b.scheduleId = s.scheduleId
            WHERE s.busDate BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE() AND s.startLocation = :destination 
            GROUP BY b.scheduleId, s.tripDay, s.busNumber, s.busDate, s.startLocation, s.stopLocation
            ORDER BY s.busDate DESC';
    $statement = $db->prepare($query);
	$statement->bindValue(':destination', $destination);
	$statement->execute();
    $last_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $last_week_bookings;
}



// get previous weeks bookings by day - i.e monday

function get_last_week_bookings_by_day($day){
	global $db;
    $query = '
            SELECT b.scheduleId, s.tripDay, s.busNumber, s.busDate,  s.busTime, s.startLocation, s.stopLocation, COUNT(b.tripId) as numberOfBookings
            FROM BusTrips AS b
            INNER JOIN BusSchedules AS s ON b.scheduleId = s.scheduleId
            WHERE s.busDate BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() AND s.tripDay = :day 
            GROUP BY b.scheduleId, s.tripDay, s.busNumber, s.busDate, s.busTime,  s.startLocation, s.stopLocation
            ORDER BY s.busDate DESC';
    $statement = $db->prepare($query);
	$statement->bindValue(':day', $day);
	$statement->execute();
    $last_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $last_week_bookings;
}

// get previous months bookings by day i.e monday bookings
function get_last_month_bookings_by_day($day){
	global $db;
    $query = '
            SELECT b.scheduleId, s.tripDay, s.busNumber, s.busDate, s.busTime, s.startLocation, s.stopLocation, COUNT(b.tripId) as numberOfBookings
            FROM BusTrips AS b
            INNER JOIN BusSchedules AS s ON b.scheduleId = s.scheduleId
            WHERE s.busDate BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE() AND s.tripDay = :day 
            GROUP BY b.scheduleId, s.tripDay, s.busNumber, s.busDate, s.startLocation, s.stopLocation
            ORDER BY s.busDate DESC';
    $statement = $db->prepare($query);
	$statement->bindValue(':day', $day);
	$statement->execute();
    $last_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $last_week_bookings;
}


// get passenger count each day for the last 7 days
function get_last_week_passenger_count($day){
	global $db;
    $query = '
        SELECT SUM(b.numberOfPassengers) as totalPassengers
        FROM Bookings AS b
        WHERE b.bookingDate BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()';
    $statement = $db->prepare($query);
	$statement->bindValue(':day', $day);
	$statement->execute();
    $last_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $last_week_bookings;
}

// last 30 days
function get_last_month_passenger_count($day){
	global $db;
    $query = '
        SELECT SUM(b.numberOfPassengers) as totalPassengers
        FROM Bookings AS b
        WHERE b.bookingDate BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()';
    $statement = $db->prepare($query);
	$statement->bindValue(':day', $day);
	$statement->execute();
    $last_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $last_week_bookings;
}

// get passenger count each day for the next 7 days
function get_next_week_passenger_count($day){
	global $db;
    $query = '
         SELECT COUNT(b.tripId) as totalPassengers
        FROM BusTrips AS b
        INNER JOIN BusSchedules AS s ON b.scheduleId = s.scheduleId
        WHERE s.busDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)';
    $statement = $db->prepare($query);
	$statement->bindValue(':day', $day);
	$statement->execute();
    $last_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $last_week_bookings;
}

function get_next_month_passenger_count($day){
	global $db;
    $query = '
         SELECT COUNT(b.tripId) as totalPassengers
        FROM BusTrips AS b
        INNER JOIN BusSchedules AS s ON b.scheduleId = s.scheduleId
        WHERE s.busDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)';
    $statement = $db->prepare($query);
	$statement->bindValue(':day', $day);
	$statement->execute();
    $last_week_bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $last_week_bookings;
}
?>



