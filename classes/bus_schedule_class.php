<?php
require('../model/database.php');

class BusSchedule {
    private $db; // Database connection

    public function __construct($db) {
        $this->db = $db;
    }

    public function createSchedule($busDate, $startLocation, $busTime) {
        try {
            // Determine $tripDay based on the provided $busDate
            $tripDay = $this->determineTripDay($busDate);

            // Determine $busNumber based on the provided $startLocation and $tripDay
            $busNumber = $this->determineBusNumber($startLocation, $tripDay, $busTime);

            $query = "INSERT INTO BusSchedules (tripDay, busNumber, busDate, busTime, startLocation, stopLocation) 
                      VALUES (:tripDay, :busNumber, :busDate, :busTime, :startLocation, :stopLocation)";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':tripDay', $tripDay);
            $statement->bindParam(':busNumber', $busNumber);
            $statement->bindParam(':busDate', $busDate);
            $statement->bindParam(':busTime', $busTime);
            $statement->bindParam(':startLocation', $startLocation);

            // Determine $stopLocation based on $startLocation
            $stopLocation = ($startLocation == 'Toowoomba') ? 'Springfield' : 'Toowoomba';
            $statement->bindParam(':stopLocation', $stopLocation);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            // Handle the error
            return false;
        }
    }

    // Function to determine $tripDay based on $busDate
    private function determineTripDay($busDate) {
        return date('l', strtotime($busDate));
    }

    // Function to determine $busNumber based on $startLocation, $tripDay, and $busTime
    private function determineBusNumber($startLocation, $tripDay, $busTime) {
        try {
            // Prepare and execute a query to fetch the bus number based on start location and time
            $query = "SELECT busNo FROM busTimeTable WHERE startStop = :startLocation AND stopOneTime <= :busTime";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':startLocation', $startLocation);
            $statement->bindParam(':busTime', $busTime);    
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            // If a result is found, return the bus number, otherwise return null
            if ($result && isset($result['busNo'])) {
                $busNumber = $result['busNo'];
                return $busNumber;
            } else {
                return null; // Handle this case appropriately
            }
        } catch (PDOException $e) {
            // Handle any database errors here
            return null; // Handle this case appropriately
        }
    }

    public function getScheduleByDay($tripDay) {
        try {
            $query = "SELECT * FROM BusSchedules WHERE tripDay = :tripDay";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':tripDay', $tripDay);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the error
            return [];
        }
    }

    public function getExistingSchedule($date, $departure, $startTime) {
        try {
            $query = "SELECT * FROM BusSchedules WHERE busDate = :date 
                      AND startLocation = :departure AND busTime = :startTime";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':date', $date);
            $statement->bindParam(':departure', $departure);
            $statement->bindParam(':startTime', $startTime);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the error
            return false;
        }
    }
}
?>
