<?php

namespace Models;

use Core\Database;

class StaffModel
{
    private $db;

    public function __construct()
    {
        // Use existing database connection
        $this->db = (new Database())->connect();
    }

    public function findByEmail($email)
{
    $query = 'SELECT * FROM staff WHERE email = :email';
    $statement = $this->db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $result = $statement->fetch();
    if (!$result) {
        error_log('Email not found in database: ' . $email);
    }
    return $result;
}


    /**
     * Retrieve all staff records from the database.
     */
    public function getAllStaff()
    {
        $query = $this->db->query("SELECT * FROM staff");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createStaff($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO staff (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $hashedPassword]);
    }
    
    public function updateStaff($id, $name, $email, $password = null)
    {
        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare("UPDATE staff SET name = ?, email = ?, password = ? WHERE id = ?");
            return $stmt->execute([$name, $email, $hashedPassword, $id]);
        } else {
            $stmt = $this->db->prepare("UPDATE staff SET name = ?, email = ? WHERE id = ?");
            return $stmt->execute([$name, $email, $id]);
        }
    }

    /**
     * Delete a staff record from the database.
     */
    public function deleteStaff($id)
    {
        $stmt = $this->db->prepare("DELETE FROM staff WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function viewServices()
    {
        $services = $this->serviceModel->getUpcomingServices();
        require __DIR__ . '/../views/view-services.php';
    }
    
    public function setService($data)
    {
        if (isset($data['id'])) {
            $result = $this->serviceModel->updateService($data['id'], $data);
        } else {
            $result = $this->serviceModel->createService($data);
        }
    
        if ($result) {
            echo '<script>alert("Service saved successfully."); window.location.href="/view-services";</script>';
        } else {
            echo '<script>alert("Failed to save service."); window.location.href="/set-service";</script>';
        }
    }
    
    public function printReservations($serviceId)
    {
        $reservations = $this->bookingModel->getReservationsByService($serviceId);
        require __DIR__ . '/../views/print-reservations.php';
    }
    
    /**
     * Find a staff member by email.
     */
    public function getStaffByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM staff WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
