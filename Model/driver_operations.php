<?php



# shows the drivers the buses for that day for toowoomba
function get_days_trips($day, $destination){
	global $db;
    $query = 'SELECT * FROM busTimeTable
			  WHERE busDay = :day AND finishStop = :destination
			  ORDER BY stopOneTime';
    $statement = $db->prepare($query);
    $statement->bindValue(':day', $day);
	$statement->bindValue(':destination', $destination);
	$statement->execute();
    $bus_trip_day = $statement->fetchAll();
    $statement->closeCursor();
    return $bus_trip_day;
}


# lets driver view passengers on their bus using date
function get_bus_schedule($date, $day, $time, $destination){
	global $db;
    $query = 'SELECT * FROM busSchedules
			  WHERE busDate = :date AND stopLocation = :destination AND busTime = :time AND tripDay = :day
			  ORDER BY busDate';
			  
    $statement = $db->prepare($query);
    $statement->bindValue(':date', $date);
	$statement->bindValue(':day', $day);
	$statement->bindValue(':destination', $destination);
	$statement->bindValue(':time', $time);
	$statement->execute();
    $bus_trip_day = $statement->fetchAll();
    $statement->closeCursor();
    return $bus_trip_day;
	
	
	
}


function get_passengers_by_schedule_ID($schedule_id){
	global $db;
    $query = 'SELECT * FROM BusTrips
			  WHERE scheduleId = :schedule_id
			  ORDER BY scheduleId';
			  
    $statement = $db->prepare($query);
    $statement->bindValue(':schedule_id', $schedule_id);
	$statement->execute();
    $bus_trip_day = $statement->fetchAll();
    $statement->closeCursor();
    return $bus_trip_day;
	
	
}


# lets driver add passenger to their bus - available in user booking







# lets the bus driver mark a passenger as off 
function mark_off_passenger($off_time, $finished, $trip_id, $uni_id) {
    global $db;
    $query = 'UPDATE BusTrips
              SET offTime = :off_time,
				  finished = :finished
              WHERE tripId = :trip_id AND unisqId = :uni_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':off_time', $off_time);
    $statement->bindValue(':finished', $finished);
    $statement->bindValue(':trip_id', $trip_id);
    $statement->bindValue(':uni_id', $uni_id);
    $statement->execute();
    $marked_off = $statement->fetch();
    $statement->closeCursor();
    return $marked_off;
}



?>