<?php

// Function to get the bus trips for a specific day and destination
function get_days_trips($day, $destination) {
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

// Function to get passengers by schedule ID
function get_passengers_by_schedule_ID($schedule_id) {
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

// Function to mark a passenger as off
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

// Function to get schedule ID by BusNo
function get_schedule_ID_by_BusNo($busNo) {
    global $db;
    $query = 'SELECT * FROM BusSchedules
              WHERE busNumber = :busNo
              ORDER BY BusNumber';
    $statement = $db->prepare($query);
    $statement->bindValue(':busNo', $busNo);
    $statement->execute();
    $id_by_BusNo = $statement->fetchAll();
    $statement->closeCursor();
    return $id_by_BusNo;
}

?>
