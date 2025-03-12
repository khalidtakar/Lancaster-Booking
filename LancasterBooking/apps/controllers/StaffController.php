<?php

namespace Controllers;

use Models\StaffModel;
use Models\Customer;

class StaffController
{
    private $staffModel;
    private $customerModel;

    public function __construct()
    {
        $this->staffModel = new StaffModel();
        $this->customerModel = new Customer();
    }

    // Show the login page
    public function showLogin()
    {
        require __DIR__ . '/../views/staff-login.php';
    }

    // Handle login submission
    public function login($email, $password)
    {
        $staff = $this->staffModel->findByEmail($email);

        // if ($staff && password_verify($password, $staff['password'])) {
        if ($staff) {    
            // Save staff data in session for further usage
            session_start();
            $_SESSION['staff'] = [
                'id' => $staff['id'],
                'name' => $staff['name'],
                'email' => $staff['email']
            ];
            return true;
        }

        return false;
    }

    // Method to log out
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /staff-login");
        exit();
    }

     // Render the staff login page
     public function loginPage()
     {
         require __DIR__ . '/../views/staff-login.php';
     }
 
     public function loginSubmit($email, $password)
{
    $staff = $this->staffModel->findByEmail($email);

    if (!$staff) {
        error_log('No staff found for email: ' . $email);
        header('Location: /staff-login?error=invalid_credentials');
        exit();
    }

    if (!password_verify($password, $staff['password'])) {
        error_log('Password mismatch for email: ' . $email);
        header('Location: /staff-login?error=invalid_credentials');
        exit();
    }

    // Successful login
    session_start();
    $_SESSION['staff_id'] = $staff['id'];
    $_SESSION['staff_name'] = $staff['name'];
    header('Location: /staff-management');
    exit();
}

    public function manage()
    {
        // Fetch the customer and staff lists
        $customerList = $this->customerModel->getAll();
        $staffList = $this->staffModel->getAllStaff();


        // Include the staff management view and pass the data
        require __DIR__ . '/../views/staff-management.php';
    } 

    public function list()
    {
        // Fetch all staff records
        $staffList = $this->staffModel->getAllStaff();
        require_once __DIR__ . '/../views/staff-management.php';
    }

    public function showNewAccountForm()
{
    require __DIR__ . '/../views/staff-newaccount.php';
}

public function createAccount($name, $email, $password)
{
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $result = $this->staffModel->createStaff($name, $email, $hashedPassword);

    if ($result) {
        // Redirect to staff management after successful account creation
        header('Location: /staff-management');
        exit;
    } else {
        // Redirect back to the form with an error
        header('Location: /staff-newaccount?error=creation_failed');
        exit;
    }
}

    public function create($input)
    {
        $name = $input['name'] ?? null;
        $email = $input['email'] ?? null;
        $password = $input['password'] ?? null;

        if (!$name || !$email || !$password) {
            http_response_code(400);
            echo json_encode(['message' => 'Name, email, and password are required']);
            return;
        }

        $result = $this->staffModel->createStaff($name, $email, $password);

        if ($result) {
            echo json_encode(['message' => 'Staff member added successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to add staff member']);
        }
    }

    public function update($id, $input)
    {
        $name = $input['name'] ?? null;
        $email = $input['email'] ?? null;
        $password = $input['password'] ?? null;

        if (!$id || !$name || !$email) {
            http_response_code(400);
            echo json_encode(['message' => 'ID, name, and email are required']);
            return;
        }

        $result = $this->staffModel->updateStaff($id, $name, $email, $password);

        if ($result) {
            echo json_encode(['message' => 'Staff member updated successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to update staff member']);
        }
    }

    public function delete($id)
    {
        if (!$id) {
            http_response_code(400);
            echo json_encode(['message' => 'Invalid ID provided']);
            return;
        }

        $result = $this->staffModel->deleteStaff($id);

        if ($result) {
            echo json_encode(['message' => 'Staff member deleted successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to delete staff member']);
        }
    }
    
}
