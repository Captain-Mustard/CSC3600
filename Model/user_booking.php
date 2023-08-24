<?php

# inserts into trips for when a trip is booked by a passenger
function insert_trip_booking($passenger_id, $passenger_type, $bus_number, 
 $bus_date, $start_location, $stop_location){
	global $db;
    $query = 'INSERT INTO BusTrips
                 (passengerId, passengerType, busNumber, 
				  busDate, startLocation, stopLocation)
              VALUES
                 (:passenger_id, :passenger_type, :bus_number,
				  :bus_date, :start_location, :stop_location)';
    $statement = $db->prepare($query);
    $statement->bindValue(':passenger_id', $passenger_id);
    $statement->bindValue(':passenger_type', $passenger_type);
    $statement->bindValue(':bus_number', $bus_number);
    $statement->bindValue(':bus_date', $bus_date);
	$statement->bindValue(':start_location', $start_location);
	$statement->bindValue(':stop_location', $stop_location);
    $statement->execute();
    $statement->closeCursor();
	
	
	
}


# insert into passengerTracking i.e when a user books this should be ran as well.

function insert_into_tracking(){
	
	
	
}

# gets the bus trip specfied by  date 
function get_trip_by_date($bus_date){
	global $db;
    $query = 'SELECT * FROM BusTrips
              ORDER BY busDate
			  WHERE busDate = :bus_date'
			  
    $statement = $db->prepare($query);
    $statement->bindValue(':bus_date', $bus_date);
	$statement->execute();
    $bus_trip_date = $statement->fetchAll();
    $statement->closeCursor();
    return $bus_trip_date;
	
	
}

# gets bus by location type
function get_trip_by_start_location($start_location){
	global $db;
    $query = 'SELECT * FROM BusTrips
              ORDER BY busDate
			  WHERE startLocation = :start_location'
			  
    $statement = $db->prepare($query);
    $statement->bindValue(':start_location', $start_location);
	$statement->execute();
    $bus_trip_date = $statement->fetchAll();
    $statement->closeCursor();
    return $bus_start_location;
	
	
}


function get_trip_by_stop_location($stop_location){
	global $db;
    $query = 'SELECT * FROM BusTrips
              ORDER BY busDate
			  WHERE stopLocation = :stop_location'
			  
    $statement = $db->prepare($query);
    $statement->bindValue(':stop_location', $stop_location);
	$statement->execute();
    $bus_trip_date = $statement->fetchAll();
    $statement->closeCursor();
    return $bus_stop_location;
	
	
	
}



# lets the bus driver mark passengers as off - like if the bus is empty
function check_passengers_off(){
	
	
	
}







?>