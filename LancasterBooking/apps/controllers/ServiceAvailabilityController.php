<?php

namespace Controllers;

use Models\ServiceAvailability;

class ServiceAvailabilityController
{
    private $serviceAvailability;

    public function __construct()
    {
        $this->serviceAvailability = new ServiceAvailability();
    }

    // List all service availabilities
    public function list()
    {
        $availabilityList = $this->serviceAvailability->getAll();
        require __DIR__ . '/../views/service-availability.php';
    }

    // Create a new service availability
    public function create($data)
    {
        $service = $data['service'];
        $available_date = $data['available_date'];
        $start_time = $data['start_time'];
        $end_time = $data['end_time'];
        $max_tables = $data['max_tables'];

        if ($this->serviceAvailability->create($service, $available_date, $start_time, $end_time, $max_tables)) {
            echo json_encode(['message' => 'Service availability created successfully']);
        } else {
            echo json_encode(['error' => 'Failed to create service availability']);
        }
    }
}
