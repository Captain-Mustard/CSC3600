<?php
# Inserts into trips when a trip is booked by a passenger
# off_time and finished can be null
function insert_trip_booking($trip_id, $uni_id, $role, $schedule_id, $off_time, $finished) {
    global $db;
    $query = 'INSERT INTO BusTrips
                 (tripId, unisqId, role, scheduleId, offTime, finished)
              VALUES
                 (:trip_id, :uni_id, :role, :schedule_id, :off_time, :finished)';
    $statement = $db->prepare($query);
    $statement->bindValue(':trip_id', $trip_id);
    $statement->bindValue(':uni_id', $uni_id);
    $statement->bindValue(':role', $role);
    $statement->bindValue(':schedule_id', $schedule_id);
    $statement->bindValue(':off_time', $off_time);
    $statement->bindValue(':finished', $finished);
    $statement->execute();
    $statement->closeCursor();
}

# Update the booking to mark passengers offTime
function update_trip_booking($trip_id, $uni_id, $off_time, $finished) {
    global $db;
    
    // Create the SQL update query
    $query = 'UPDATE BusTrips
              SET offTime = :off_time, finished = :finished
              WHERE tripId = :trip_id AND unisqId = :uni_id';
    
    // Prepare the statement
    $statement = $db->prepare($query);
    
    // Bind the values
    $statement->bindValue(':trip_id', $trip_id);
    $statement->bindValue(':uni_id', $uni_id);
    $statement->bindValue(':off_time', $off_time);
    $statement->bindValue(':finished', $finished);
    
    // Execute the query
    $statement->execute();
    
    // Close the cursor
    $statement->closeCursor();
}

# You'll have to check if a busSchedule for the day and date exists and insert one if it doesn't!
# scheduleId from this goes into the above table for the day
function insert_bus_schedule($schedule_id, $trip_day, $bus_number, $bus_date,
                             $bus_time, $start_location, $stop_location) {
    global $db;
    $query = 'INSERT INTO BusSchedules
                 (scheduleId, tripDay, busNumber, busDate,
                  busTime, startLocation, stopLocation)
              VALUES
                 (:schedule_id, :trip_day, :bus_number, :bus_date,
                  :bus_time, :start_location, :stop_location)';
    $statement = $db->prepare($query);
    $statement->bindValue(':schedule_id', $schedule_id);
    $statement->bindValue(':trip_day', $trip_day);
    $statement->bindValue(':bus_number', $bus_number);
    $statement->bindValue(':bus_date', $bus_date);
    $statement->bindValue(':bus_time', $bus_time);
    $statement->bindValue(':start_location', $start_location);
    $statement->bindValue(':stop_location', $stop_location);
    $statement->execute();
    $statement->closeCursor();
}
?>
