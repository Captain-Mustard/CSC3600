<?php
require('../model/database.php');

class BusTrip {
    private $db; // Database connection

    public function __construct($db) {
        $this->db = $db;
    }

    public function createTrip($unisqId, $scheduleId) {
        try {
            // Validate that $scheduleId is a positive integer
            if (!is_int($scheduleId) || $scheduleId <= 0) {
                // Handle the case where $scheduleId is not valid
                return false;
            }
    
            // Get the passenger's role from the database
            $passenger = $this->get_passengers($unisqId);
    
            // Check if the passenger exists and has a role
            if ($passenger && isset($passenger['role'])) {
                $role = $passenger['role'];
    
                // Insert the trip record into the database
                $query = "INSERT INTO BusTrips (unisqId, role, scheduleId, offTime, finished) VALUES (:unisqId, :role, :scheduleId, NULL, NULL)";
                $statement = $this->db->prepare($query);
                $statement->bindParam(':unisqId', $unisqId);
                $statement->bindParam(':role', $role);
                $statement->bindParam(':scheduleId', $scheduleId);
                $statement->execute();
                return true;
            } else {
                // Handle the case where the passenger's role is not found
                return false;
            }
        } catch (PDOException $e) {
            // Handle the error
            return false;
        }
    }
    
    public function finishTrip($tripId) {
        try {
            $query = "UPDATE BusTrips SET offTime = NOW(), finished = 1 WHERE tripId = :tripId";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':tripId', $tripId);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            // Handle the error
            return false;
        }
    }

    private function get_passengers($uni_id) {
        $query = 'SELECT * FROM Passengers WHERE unisqId = :uni_id';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uni_id', $uni_id);
        $statement->execute();
        $passenger = $statement->fetch();
        $statement->closeCursor();
        return $passenger;
    }
}
?>