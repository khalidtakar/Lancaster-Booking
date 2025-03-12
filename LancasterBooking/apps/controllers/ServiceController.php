<?php

namespace Controllers;

use Models\Service;

class ServiceController
{
    private $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new Service();
    }

    // View all upcoming services
    public function viewServices()
    {
        $services = $this->serviceModel->getUpcomingServices();
        require __DIR__ . '/../views/view-services.php';
    }

    // Show the form to add or edit a service
    public function showSetServiceForm($id = null)
    {
        $service = $id ? $this->serviceModel->getServiceById($id) : null;
        require __DIR__ . '/../views/set-service.php';
    }

    // Add or update a service
    public function setService($data)
{
    // Check if it's an update
    if (!empty($data['id'])) {
        $result = $this->serviceModel->updateService($data['id'], $data);
        if ($result) {
            echo "<script>alert('Service updated successfully.'); window.location.href='/view-services';</script>";
        } else {
            echo "<script>alert('Failed to update service.'); window.location.href='/set-service?id={$data['id']}';</script>";
        }
    } else {
        // Create a new service
        $result = $this->serviceModel->createService($data);
        if ($result) {
            echo "<script>alert('Service added successfully.'); window.location.href='/view-services';</script>";
        } else {
            echo "<script>alert('Failed to add service.'); window.location.href='/set-service';</script>";
        }
    }
}


    // Delete a service
    public function deleteService($id)
    {
        $result = $this->serviceModel->deleteService($id);

        if ($result) {
            echo '<script>alert("Service deleted successfully."); window.location.href="/view-services";</script>';
        } else {
            echo '<script>alert("Failed to delete service."); window.location.href="/view-services";</script>';
        }
    }

    // Print reservations for a service
    public function printReservations($serviceId)
    {
        if (!$serviceId || !is_numeric($serviceId)) {
            echo 'Invalid Service ID';
            return;
        }
    
        $reservations = $this->serviceModel->getReservationsByServiceId($serviceId);
    
        if ($reservations) {
            require __DIR__ . '/../views/print-reservations.php';
        } else {
            echo 'No reservations found for this service.';
        }
    }

    // Fetch all available services (for dropdown)
public function getAvailableServices()
{
    $services = $this->serviceModel->getUpcomingServices();

    header('Content-Type: application/json');
    echo json_encode($services);
    exit;
}

// Fetch details of a specific service
public function getServiceDetails($service)
{
    $query = "SELECT * FROM service_availability 
              WHERE service = :service AND available_date = CURDATE() 
              LIMIT 1"; // Match today's date for the selected service
    $statement = $this->db->prepare($query);
    $statement->bindValue(':service', $service, \PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch(\PDO::FETCH_ASSOC);

    if (!$result) {
        error_log('No service found for: ' . $service);
    }

    return $result;
}
    
}
