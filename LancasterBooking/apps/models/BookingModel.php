<?php

namespace Models;

use Core\Database;

class BookingModel
{
    private $db;

    public function __construct()
    {
        // Use existing database connection
        $this->db = (new Database())->connect();
    }

    public function getAllBookings()
    {
        $query = $this->db->query("SELECT * FROM bookings");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createBooking($data)
{
    $query = "INSERT INTO bookings (name, email, party_size, quantity, service, date_time, order_item, phone, address, message)
              VALUES (:name, :email, :party_size, :quantity, :service, :date_time, :order_item, :phone, :address, :message)";
    $statement = $this->db->prepare($query);

    // Convert date_time to SQL-compatible format
    $dateTime = \DateTime::createFromFormat('Y-m-d\TH:i', $data['date_time'])->format('Y-m-d H:i:s');

    return $statement->execute([
        'name' => $data['name'],
        'email' => $data['email'],
        'party_size' => $data['party_size'],
        'quantity' => $data['quantity'] ?? null,
        'service' => $data['service'],
        'date_time' => $dateTime,
        'order_item' => $data['order_item'],
        'phone' => $data['phone'],
        'address' => $data['address'] ?? null,
        'message' => $data['message'] ?? null,
    ]);
}    

    public function updateBooking($id, $data)
{
    $query = "UPDATE bookings SET 
                name = :name, 
                email = :email, 
                party_size = :party_size, 
                quantity = :quantity,
                service = :service, 
                date_time = :date_time, 
                order_item = :order_item, 
                phone = :phone, 
                address = :address, 
                message = :message
              WHERE id = :id";

    $statement = $this->db->prepare($query);

    try {
        $result = $statement->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'party_size' => $data['party_size'],
            'quantity' => $data['quantity'] ?? null, // Handle nullable field
            'service' => $data['service'],
            'date_time' => $data['date_time'],
            'order_item' => $data['order_item'],
            'phone' => $data['phone'],
            'address' => $data['address'] ?? null, // Handle nullable field
            'message' => $data['message'] ?? null, // Handle nullable field
            'id' => $id,
        ]);

        if ($result) {
            error_log('Booking updated successfully: ' . json_encode($data));
        } else {
            error_log('SQL Error: ' . implode(', ', $statement->errorInfo()));
        }

        return $result;
    } catch (\PDOException $e) {
        error_log('PDOException: ' . $e->getMessage());
        return false;
    }
}


    public function deleteBooking($id)
    {
        $query = "DELETE FROM bookings WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        return $statement->execute();
    }

    public function findBookingById($id)
    {
        $query = "SELECT * FROM bookings WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getTodaysBookings()
{
    $today = date('Y-m-d');
    $query = "SELECT * FROM bookings WHERE DATE(date_time) = :today ORDER BY date_time ASC";
    $statement = $this->db->prepare($query);
    $statement->bindValue(':today', $today);
    $statement->execute();
    return $statement->fetchAll(\PDO::FETCH_ASSOC);
}

public function getUpcomingServices()
{
    $query = "SELECT service, start_time, end_time FROM service_availability WHERE available_date >= CURDATE() ORDER BY available_date ASC";
    $statement = $this->db->query($query);
    return $statement->fetchAll(\PDO::FETCH_ASSOC);
}


public function getReservationsByService($serviceId)
{
    $query = "SELECT * FROM bookings WHERE service_id = :service_id";
    $statement = $this->db->prepare($query);
    $statement->bindValue(':service_id', $serviceId, \PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetchAll(\PDO::FETCH_ASSOC);
}

public function getServiceDetails($serviceName)
{
    $query = "SELECT * FROM service_availability WHERE service = :service AND available_date >= CURDATE() LIMIT 1";
    $statement = $this->db->prepare($query);
    $statement->bindValue(':service', $serviceName);
    $statement->execute();
    return $statement->fetch(\PDO::FETCH_ASSOC);
}

public function getReservationsForNextService()
{
    $currentDateTime = new \DateTime();
    $services = [
        'breakfast' => ['07:30:00', '10:30:00'],
        'lunch' => ['12:00:00', '14:30:00'],
        'dinner' => ['17:00:00', '22:30:00']
    ];

    foreach ($services as $service => [$startTime, $endTime]) {
        $startDateTime = new \DateTime($currentDateTime->format('Y-m-d') . ' ' . $startTime);
        $endDateTime = new \DateTime($currentDateTime->format('Y-m-d') . ' ' . $endTime);

        if ($currentDateTime < $endDateTime) {
            // Query for reservations between start and end time
            $query = "
                SELECT id, date_time, name, party_size
                FROM bookings
                WHERE service = :service
                  AND date_time BETWEEN :start AND :end
                ORDER BY date_time ASC
            ";

            $statement = $this->db->prepare($query);
            $statement->execute([
                ':service' => $service,
                ':start' => $startDateTime->format('Y-m-d H:i:s'),
                ':end' => $endDateTime->format('Y-m-d H:i:s')
            ]);

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    return [];
}

}
