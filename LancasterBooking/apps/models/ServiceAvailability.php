<?php

namespace Models;

use Core\Database;

class ServiceAvailability
{
    private $conn;
    private $table = 'service_availability';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Get all service availabilities
    public function getAll()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Create a new service availability
    public function create($service, $available_date, $start_time, $end_time, $max_tables)
    {
        $query = "INSERT INTO {$this->table} (service, available_date, start_time, end_time, max_tables) 
                  VALUES (:service, :available_date, :start_time, :end_time, :max_tables)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':service', $service);
        $stmt->bindParam(':available_date', $available_date);
        $stmt->bindParam(':start_time', $start_time);
        $stmt->bindParam(':end_time', $end_time);
        $stmt->bindParam(':max_tables', $max_tables);
        return $stmt->execute();
    }
}
