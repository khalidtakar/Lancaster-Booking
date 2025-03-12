<?php

namespace Controllers;

use Models\BookingModel;
use Models\Service;

class BookingController
{
    private $model;
    private $serviceModel;

    public function __construct()
    {
        $this->model = new BookingModel();
        $this->serviceModel = new Service();
    }

    public function showBookingForm()
    {
        $services = $this->model->getUpcomingServices(); // Fetch available services
        include __DIR__ . '/../views/booking_form.php'; // Pass services to the view
    }

    // Display all bookings
    public function index()
    {
        $bookings = $this->model->getAllBookings();
        include __DIR__ . '/../views/view-bookings.php';
    }

    public function create()
    {
        $data = $_POST;
    
        if ($this->validateBooking($data)) {
            if ($this->model->createBooking($data)) {
                session_start();
                $_SESSION['bookingDetails'] = [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'service' => $data['service'],
                    'date' => date('Y-m-d', strtotime($data['date_time'])),
                    'time' => date('H:i', strtotime($data['date_time'])),
                    'party_size' => $data['party_size'],
                ];
    
                header('Location: /bookings/confirmation');
                exit;
            } else {
                echo "Error: Failed to create booking. Please try again.";
            }
        } else {
            echo "Error: Invalid booking data. Please check your input.";
        }
    }
    

    // Update an existing booking
    public function update()
    {
        $id = $_POST['id'] ?? null;
        $data = $_POST;

        if ($id && $this->validateBooking($data)) {
            if ($this->model->updateBooking($id, $data)) {
                header('Location: /view-bookings');
                exit;
            } else {
                echo "Error: Failed to update booking. Please try again.";
            }
        } else {
            echo "Error: Invalid data provided.";
        }
    }

    // Delete a booking
    public function delete()
    {
        $id = $_POST['id'] ?? null;

        if ($id) {
            if ($this->model->deleteBooking($id)) {
                header('Location: /view-bookings');
                exit;
            } else {
                echo "Error: Failed to delete booking.";
            }
        } else {
            echo "Error: Invalid booking ID.";
        }
    }

    // Edit a booking (fetch data for editing)
    public function edit($id)
    {
        if (!$id) {
            echo "Error: Invalid Booking ID.";
            return;
        }

        $booking = $this->model->findBookingById($id);

        if (!$booking) {
            echo "Error: Booking not found.";
            return;
        }

        include __DIR__ . '/../views/booking-form.php';
    }

    // Validate booking data
    private function validateBooking($data)
    {
        // Fetch service details for the selected service
        $serviceDetails = $this->model->getServiceDetails($data['service']);
    
        if (!$serviceDetails) {
            error_log('Service not found: ' . $data['service']);
            return false;
        }
    
        // Extract service details
        $currentDate = new \DateTime(); // Current date/time
        $availableStartDate = new \DateTime($serviceDetails['available_date'] . ' ' . $serviceDetails['start_time']);
        $availableEndDate = new \DateTime($serviceDetails['available_date'] . ' ' . $serviceDetails['end_time']);
        $bookingDateTime = \DateTime::createFromFormat('Y-m-d\TH:i', $data['date_time']);
    
        // Check if booking date is within the valid range (current date to service available end date)
        if ($bookingDateTime < $currentDate || $bookingDateTime > $availableEndDate) {
            error_log('Booking date is outside the valid range.');
            return false;
        }
    
        // Additional validation for other fields
        return !empty($data['name']) &&
               filter_var($data['email'], FILTER_VALIDATE_EMAIL) &&
               !empty($data['party_size']) &&
               $data['party_size'] > 0 &&
               $data['party_size'] <= 6 &&
               !empty($data['order_item']) &&
               !empty($data['phone']);
    }
    
    // List upcoming services
    public function listUpcomingServices()
    {
        $services = $this->model->getUpcomingServices();
        include __DIR__ . '/../views/view-services.php';
    }

    public function confirmation()
{
    // Retrieve booking details from session or database
    session_start();
    if (!isset($_SESSION['bookingDetails'])) {
        header('Location: /'); // Redirect to home if no booking details are available
        exit;
    }

    $bookingDetails = $_SESSION['bookingDetails'];

    // Generate .eml file
    $this->generateEmailFile($bookingDetails);

    // Generate .ics file
    $this->generateCalendarFile($bookingDetails);

    // Pass data to the confirmation view
    include __DIR__ . '/../views/confirmation.php';
}

private function generateEmailFile($details)
{
    $emailPath = __DIR__ . '/../../public/emails/booking-confirmation.eml';

    // Ensure the directory exists
    if (!is_dir(dirname($emailPath))) {
        mkdir(dirname($emailPath), 0777, true); // Create directory if it doesn't exist
    }

    $emailContent = "To: {$details['email']}\r\n";
    $emailContent .= "Subject: Booking Confirmation\r\n";
    $emailContent .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
    $emailContent .= "Thank you for your reservation, {$details['name']}!\r\n";
    $emailContent .= "Service: {$details['service']}\r\n";
    $emailContent .= "Date: {$details['date']}\r\n";
    $emailContent .= "Time: {$details['time']}\r\n";
    $emailContent .= "Party Size: {$details['party_size']}\r\n";

    file_put_contents($emailPath, $emailContent);
}

private function generateCalendarFile($details)
{
    $calendarPath = __DIR__ . '/../../public/calendar/booking-confirmation.ics';

    // Ensure the directory exists
    if (!is_dir(dirname($calendarPath))) {
        mkdir(dirname($calendarPath), 0777, true); // Create directory if it doesn't exist
    }

    $startDateTime = new \DateTime("{$details['date']} {$details['time']}"); // Use global namespace
    $endDateTime = (clone $startDateTime)->add(new \DateInterval('PT2H')); // Booking duration: 2 hours

    $calendarContent = "BEGIN:VCALENDAR\r\n";
    $calendarContent .= "VERSION:2.0\r\n";
    $calendarContent .= "BEGIN:VEVENT\r\n";
    $calendarContent .= "DTSTART:" . $startDateTime->format('Ymd\THis') . "\r\n";
    $calendarContent .= "DTEND:" . $endDateTime->format('Ymd\THis') . "\r\n";
    $calendarContent .= "SUMMARY:Booking Confirmation - {$details['service']}\r\n";
    $calendarContent .= "DESCRIPTION:Booking for {$details['name']} at {$details['time']} on {$details['date']}\r\n";
    $calendarContent .= "END:VEVENT\r\n";
    $calendarContent .= "END:VCALENDAR\r\n";

    file_put_contents($calendarPath, $calendarContent);
}

public function printReservations()
{
    // Fetch reservations for the next service
    $reservations = $this->model->getReservationsForNextService();
    
    if (!$reservations) {
        echo "No reservations available for the next service.";
        return;
    }
    
    // Include the view
    include __DIR__ . '/../views/print-reservations.php';
}

}   
