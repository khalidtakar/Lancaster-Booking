<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Controllers\ProductController;
use Controllers\StaffController;
use Controllers\CustomerController;
use Controllers\BookingController;
use Controllers\ServiceAvailabilityController;
use Controllers\HomeController;
use Controllers\ServiceController;


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];


// Routes

switch ($uri) {

    case '/':
        $controller = new HomeController();
        $controller->index();
        break;

        // View all services
case '/view-services':
    $controller = new ServiceController();
    $controller->viewServices();
    break;

// Set a new service or edit an existing one
case '/set-service':
    $controller = new ServiceController();
    if ($method === 'GET') {
        $id = $_GET['id'] ?? null;
        $controller->showSetServiceForm($id);
    } elseif ($method === 'POST') {
        $controller->setService($_POST);
    } else {
        http_response_code(405);
        echo 'Method Not Allowed';
    }
    break;

// Get available services (API endpoint for dynamic dropdown)
case '/get-available-services':
    $controller = new ServiceController();
    $controller->getAvailableServices();
    break;

// Get details for a specific service
case '/get-service-details':
    $controller = new ServiceController();
    $controller->getServiceDetails();
    break;

// Delete a service
case '/delete-service':
    $controller = new ServiceController();
    if ($method === 'POST') {
        $controller->deleteService($_POST['id'] ?? null);
    } else {
        http_response_code(405);
        echo 'Method Not Allowed';
    }
    break;

// Print reservations for a service
case '/bookings/print-reservations':
    $controller = new BookingController();
    $controller->printReservations();
    break;


    // Booking Confirmation
case '/bookings/confirmation':
    $controller = new BookingController();
    $controller->confirmation();
    break;
    

    // Display the booking form (for creating a new booking)
    case '/bookings/create':
        $controller = new BookingController();
        if ($method === 'GET') {
            $controller->showBookingForm(); // Show the form
        } elseif ($method === 'POST') {
            $controller->create(); // Process the booking
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;
    

    // Display the list of bookings
    case '/view-bookings':
        $controller = new BookingController();
        if ($method === 'GET') {
            $controller->index();
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;

    // Update a booking (edit form submission)
    case '/bookings/update':
        $controller = new BookingController();
        if ($method === 'POST') {
            $controller->update();
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;

    // Delete a booking
    case '/bookings/delete':
        $controller = new BookingController();
        if ($method === 'POST') {
            $controller->delete();
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;

    // Edit a booking (show form with pre-filled data)
    case '/bookings/edit':
        $controller = new BookingController();
        if ($method === 'GET') {
            $id = $_GET['id'] ?? null; // Get the booking ID from the query string
            if ($id) {
                $controller->edit($id);
            } else {
                http_response_code(400);
                echo 'Invalid Booking ID';
            }
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;
    
            // Route to display the staff login page
case '/staff-login':
    $controller = new StaffController();
    if ($method === 'GET') {
        $controller->showLogin();
    } else {
        http_response_code(405);
        echo "Method Not Allowed";
    }
    break;

// Route to handle staff login submission
case '/staff-login-submit':
    if ($method === 'POST') {
        $email = $_POST['staff-email'] ?? null;
        $password = $_POST['staff-password'] ?? null;

        error_log("Username: $email");
        error_log("Password: $password");

        $controller = new StaffController();
        if ($controller->login($email, $password)) {
            // Redirect to staff management after successful login
            header("Location: /staff-management");
            exit();
        } else {
            echo "<script>alert('Invalid login credentials. Please try again.'); 
            window.location.href='/staff-login';</script>";
        }
    } else {
        http_response_code(405);
        echo "Method Not Allowed";
    }
    break;

// Route to handle staff logout
case '/staff-logout':
    $controller = new StaffController();
    $controller->logout();
    break;

        case '/staff-management':
            $controller = new StaffController();
            $controller->manage();
    
            if ($method === 'GET') {
                // Display the staff list view
                $controller->list();
            } elseif ($method === 'POST') {
                // Check for `id` to determine create or update
                $input = json_decode(file_get_contents('php://input'), true);
                if (isset($input['id']) && !empty($input['id'])) {
                    $controller->update($input['id'], $input);
                } else {
                    $controller->create($input);
                }
            } elseif ($method === 'DELETE') {
                // Handle delete staff
                $input = json_decode(file_get_contents('php://input'), true);
                if (isset($input['id']) && !empty($input['id'])) {
                    $controller->delete($input['id']);
                } else {
                    http_response_code(400);
                    echo json_encode(['message' => 'Invalid ID']);
                }
            } else {
                http_response_code(405);
                echo 'Method Not Allowed';
            }
            break;    

        case '/staff-management/delete':
            if ($method === 'POST') {
                $input = json_decode(file_get_contents('php://input'), true);
                $controller = new StaffController();
        
                if (isset($input['id']) && !empty($input['id'])) {
                    $controller->delete($input['id']);
                } else {
                    http_response_code(400);
                    echo json_encode(['message' => 'Invalid ID']);
                }
            } else {
                http_response_code(405);
                echo 'Method Not Allowed';
            }
            break;    

            case '/staff-management/add':
    if ($method === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);
        $controller = new StaffController();
        $controller->create($input);
    } else {
        http_response_code(405);
        echo 'Method Not Allowed';
    }
    break;

case '/staff-management/update':
    if ($method === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);
        $controller = new StaffController();
        if (isset($input['id']) && !empty($input['id'])) {
            $controller->update($input['id'], $input);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'ID is required for update']);
        }
    } else {
        http_response_code(405);
        echo 'Method Not Allowed';
    }
    break;

    case '/staff-management/list':
        if ($method === 'GET') {
            $controller = new StaffController();
            $controller->list();
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
    break;

    case '/staff-newaccount':
        $controller = new StaffController();
        $controller->showNewAccountForm();
    break;

    case '/staff-newaccount-submit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new StaffController();
            $controller->createAccount($_POST['name'], $_POST['email'], $_POST['password']);
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
    break; 

    case '/customer-login':
            $controller = new CustomerController();
            if ($method === 'GET') {
                $controller->showLogin();
            } else {
                http_response_code(405);
                echo "Method Not Allowed";
            }
            break;

    case '/customer-login-submit':
        if ($method === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            
            $controller = new CustomerController();
        if ($controller->login($email, $password)) {
         // Redirect to booking form after successful login
            header("Location: /booking_form");
            exit;
                } else {
                    echo "Invalid login credentials. Please try again.";
            }
                } else {
                    http_response_code(405);
                    echo "Method Not Allowed";
                }
                break;        
        
        case '/customer-logout':
            session_start();
            session_unset();
            session_destroy();
            header('Location: /customer-login?logout=success');
        exit;

        case '/change-password':
            $controller = new CustomerController();
            $controller->showChangePassword();
        break;

    case '/change-password-submit':
        if ($method === 'POST') {
            $email = $_POST['email'];
            $confirmEmail = $_POST['confirm_email'];
            $newPassword = $_POST['new_password'];

            $controller = new CustomerController();
            $controller->changePassword($email, $confirmEmail, $newPassword);
        } else {
            http_response_code(405);
            echo "Method Not Allowed";
        }
        break;

        case '/customer-newaccount':
            $controller = new CustomerController();
            $controller->showNewAccountForm();
            break;
        
        case '/customer-newaccount-submit':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new CustomerController();
                $controller->createAccount($_POST['name'], $_POST['email'], $_POST['password']);
            } else {
                http_response_code(405);
                echo 'Method Not Allowed';
            }
            break;
            
        
        
        case '/booking_form':
                require __DIR__ . '/../apps/views/booking-form.php';
            break;
 
    // Order Page
    case '/order':
        $controller = new CustomerController();
        $controller->showOrderPage();
        break;

    // Create Account Page
    case '/create-account':
        $controller = new CustomerController();
        $controller->showCreateAccountPage();
        break;    


    case '/view-customers':
        $controller = new CustomerController();
        $controller->list();
        break;

    case '/create-customer':
        if ($method === 'POST') {
            $input = $_POST;
            $controller = new CustomerController();
            $controller->create($input);
            $controller->list();
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;

    case '/delete-customer':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new Controllers\CustomerController();
        $id = $_POST['id'] ?? null;

        if ($id) {
            $controller->deleteCustomer($id);
        } else {
            http_response_code(400);
            echo 'Invalid customer ID.';
        }
    } else {
        http_response_code(405);
        echo 'Method Not Allowed';
    }
    break;
    

    // Booking Routes
    case '/bookings':
        $controller = new BookingController();
        if ($method === 'GET') {
            $controller->list();
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;

    case '/create-booking':
        $controller = new BookingController();
        if ($method === 'POST') {
            $input = $_POST;
            $controller->create($input);
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;

    case '/update-booking':
        $controller = new BookingController();
        if ($method === 'POST') {
            $id = $_POST['id'] ?? null;
            $input = $_POST;
            if ($id) {
                $controller->update($id, $input);
            } else {
                http_response_code(400);
                echo 'Booking ID is required for update.';
            }
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;

    case '/delete-booking':
        $controller = new BookingController();
        if ($method === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $controller->delete($id);
            } else {
                http_response_code(400);
                echo 'Booking ID is required for deletion.';
            }
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;

    case '/view-booking':
        $controller = new BookingController();
        if ($method === 'GET') {
            $id = $_GET['id'] ?? null;
            if ($id) {
                $controller->view($id);
            } else {
                http_response_code(400);
                echo 'Booking ID is required to view the booking.';
            }
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;

    case '/service-availability':
        $controller = new ServiceAvailabilityController();
        $controller->list();
        break;

    case '/create-service-availability':
        if ($method === 'POST') {
            $input = $_POST;
            $controller = new ServiceAvailabilityController();
            $controller->create($input);
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;

    default:
        http_response_code(404);
        echo 'Page Not Found';
}
