<?php

// Function to get the Springfield timetable
function get_springfield_timetable() {
    global $db;
    $query = 'SELECT * FROM ToowoombaBound
              ORDER BY busNo';
    $statement = $db->prepare($query);
    $statement->execute();
    $toowoomba_bus = $statement->fetchAll();
    $statement->closeCursor();
    return $toowoomba_bus;
}

// Function to get the Toowoomba timetable
function get_toowoomba_timetable() {
    global $db;
    $query = 'SELECT * FROM SpringfieldBound
              ORDER BY busNo';
    $statement = $db->prepare($query);
    $statement->execute();
    $springfield_bus = $statement->fetchAll();
    $statement->closeCursor();
    return $springfield_bus;
}

// Function to get bus trips by user ID
function getBusTripsByUserId($db, $user_id) {
    $sql = "SELECT BusTrips.tripId, BusSchedules.tripDay, BusSchedules.busNumber, BusSchedules.busDate, BusSchedules.busTime, BusSchedules.startLocation, BusSchedules.stopLocation
            FROM BusTrips
            INNER JOIN BusSchedules ON BusTrips.scheduleId = BusSchedules.scheduleId
            WHERE BusTrips.unisqId = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to delete a user's bus trip
function deleteBusTrip($db, $user_id, $trip_id) {
    $sql = "DELETE FROM BusTrips
            WHERE tripId = :trip_id AND unisqId = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':trip_id', $trip_id, PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    return $stmt->execute();
}

// Function to insert a new bus trip (Note: Not working, needs debugging)
function insertNewBusTrip($trip_day, $bus_number, $bus_date, $bus_time, $start_location, $stop_location) {
    global $db;
    try {
        $db->beginTransaction();
        $query = 'INSERT INTO BusSchedules (tripDay, busNumber, busDate, busTime, startLocation, stopLocation)
                  VALUES (:trip_day, :bus_number, :bus_date, :bus_time, :start_location, :stop_location)';
        $statement = $db->prepare($query);
        $statement->bindValue(':trip_day', $trip_day, PDO::PARAM_STR);
        $statement->bindValue(':bus_number', $bus_number, PDO::PARAM_STR);
        $statement->bindValue(':bus_date', $bus_date, PDO::PARAM_STR);
        $statement->bindValue(':bus_time', $bus_time, PDO::PARAM_STR);
        $statement->bindValue(':start_location', $start_location, PDO::PARAM_STR);
        $statement->bindValue(':stop_location', $stop_location, PDO::PARAM_STR);
        $statement->execute();
        $db->commit();
        return true; // Success
    } catch (PDOException $e) {
        // If an error occurs, rollback the transaction and return false
        $db->rollBack();
        return false;
    }
}

// Function to get bus schedule by date, day, and time
function get_bus_schedule($date, $day, $time){
	global $db;
    $query = 'SELECT * FROM  BusSchedules
              WHERE busDate = :date AND tripDay = :day AND busTime = :time
              ORDER BY busTime';
    $statement = $db->prepare($query);
    $statement->bindValue(':date', $date);
	$statement->bindValue(':day', $day);
	$statement->bindValue(':time', $time);
	$statement->execute();
    $bus_schedule = $statement->fetchAll();
    $statement->closeCursor();
    return $bus_schedule;
}

// Function to get bus schedule by ID
function get_bus_schedule_by_id($id){
	global $db;
    $query = 'SELECT * FROM  BusSchedules
              WHERE scheduleId = :id 
              ORDER BY busTime';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
	$statement->execute();
    $bus_schedule = $statement->fetchAll();
    $statement->closeCursor();
    return $bus_schedule;
}

// Function to get the Springfield timetable for a specific day
function get_springfield_timetable_by_day($day){
	global $db;
    $query = 'SELECT * FROM busTimeTable
              WHERE busDay = :day AND startStop = :start_stop AND finishStop = :finish_stop
              ORDER BY stopOneTime';
    $statement = $db->prepare($query);
    $statement->bindValue(':day', $day, PDO::PARAM_STR);
    $statement->bindValue(':start_stop', 'Toowoomba', PDO::PARAM_STR);
    $statement->bindValue(':finish_stop', 'SpringField', PDO::PARAM_STR);
    $statement->execute();
    $springfield_bus = $statement->fetchAll();
    $statement->closeCursor();
    return $springfield_bus;
}

// Function to get the Toowoomba timetable for a specific day
function get_toowoomba_timetable_by_day($day){
	global $db;
    $query = 'SELECT * FROM busTimeTable
              WHERE busDay = :day AND startStop = :start_stop AND finishStop = :finish_stop
              ORDER BY stopOneTime';
    $statement = $db->prepare($query);
    $statement->bindValue(':day', $day, PDO::PARAM_STR);
    $statement->bindValue(':start_stop', 'SpringField', PDO::PARAM_STR);
    $statement->bindValue(':finish_stop', 'Toowoomba', PDO::PARAM_STR);
    $statement->execute();
    $toowoomba_bus = $statement->fetchAll();
    $statement->closeCursor();
    return $toowoomba_bus;
}

?>