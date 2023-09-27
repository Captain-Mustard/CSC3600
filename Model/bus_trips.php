<?php

# gets time table for both runs
function get_springfield_timetable(){
	global $db;
    $query = 'SELECT * FROM ToowoombaBound
              ORDER BY busNo';
    $statement = $db->prepare($query);
    $statement->execute();
    $toowoomba_bus = $statement->fetchAll();
    $statement->closeCursor();
    return $toowoomba_bus;
	
	
}

function get_toowoomba_timetable(){
	global $db;
    $query = 'SELECT * FROM SpringfieldBound
              ORDER BY busNo';
    $statement = $db->prepare($query);
    $statement->execute();
    $springfield_bus = $statement->fetchAll();
    $statement->closeCursor();
    return $springfield_bus;
	
	
}

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




# function to get bus schedule by date, day, and time
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


# function to get bus schedule id

function get_bus_schedule($id){
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

?>