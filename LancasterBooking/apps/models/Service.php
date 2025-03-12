<?php

namespace Models;

use Core\Database;

class Service
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function getUpcomingServices()
    {
        $query = "SELECT * FROM service_availability WHERE available_date >= CURDATE() ORDER BY available_date ASC";
        $statement = $this->db->query($query);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createService($data)
    {
        $query = "INSERT INTO service_availability (service, available_date, start_time, end_time, max_tables) 
                  VALUES (:service, :available_date, :start_time, :end_time, :max_tables)";
        $statement = $this->db->prepare($query);
        return $statement->execute([
            ':service' => $data['service'],
            ':available_date' => $data['available_date'],
            ':start_time' => $data['start_time'],
            ':end_time' => $data['end_time'],
            ':max_tables' => $data['max_tables'],
        ]);
    }

    public function updateService($id, $data)
    {
        $query = "UPDATE service_availability 
                  SET service = :service, available_date = :available_date, start_time = :start_time, end_time = :end_time, max_tables = :max_tables 
                  WHERE id = :id";
        $statement = $this->db->prepare($query);
        return $statement->execute([
            ':service' => $data['service'],
            ':available_date' => $data['available_date'],
            ':start_time' => $data['start_time'],
            ':end_time' => $data['end_time'],
            ':max_tables' => $data['max_tables'],
            ':id' => $id,
        ]);
    }

    public function deleteService($id)
    {
        $query = "DELETE FROM service_availability WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        return $statement->execute();
    }

    public function getReservationsByServiceId($serviceId)
    {
        $query = "SELECT * FROM bookings WHERE service = :service";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':service', $serviceId, \PDO::PARAM_STR); // Assuming service is stored as string like "breakfast"
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getServiceById($id)
    {
        $query = "SELECT * FROM service_availability WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getServiceDetails($serviceName)
{
    $query = "SELECT * FROM service_availability 
              WHERE service = :service 
              AND available_date >= CURDATE() 
              ORDER BY available_date ASC 
              LIMIT 1"; // Fetch the next available service
    $statement = $this->db->prepare($query);
    $statement->bindValue(':service', $serviceName, \PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch(\PDO::FETCH_ASSOC);
}

    

}
