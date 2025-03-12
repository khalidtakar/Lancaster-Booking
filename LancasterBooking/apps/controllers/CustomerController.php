<?php

namespace Controllers;

use Models\Customer;

class CustomerController
{
    private $customer;
    private $customerModel;

    public function __construct()
    {
        $this->customer = new Customer();
        $this->customerModel = new Customer();
    }

    // List all customers
    public function list()
    {
        $customerList = $this->customer->getAll();
        require __DIR__ . '/../views/view-customer.php';
    }

    // Add a new customer
    public function create($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];


        if ($this->customer->create($name, $email, $password)) {
            // echo json_encode(['message' => 'Customer created successfully']);
        } else {
           // echo json_encode(['error' => 'Failed to create customer']);
        }
    }

    public function deleteCustomer($id)
    {
        $result = $this->customerModel->delete($id);

        if ($result) {
            header('Location: /view-customers'); // Redirect back to the customers page
            exit;
        } else {
            echo 'Failed to delete customer.';
        }
    }

    // Show the login page
    public function showLogin()
    {
        require __DIR__ . '/../views/customer-login.php';
    }

    // Handle login submission
    public function login($email, $password)
    {
        $customer = $this->customer->findByEmail($email); // Fixed

        if ($customer && password_verify($password, $customer['password'])) {
            // Save customer data in session for further usage
            session_start();
            $_SESSION['customer'] = $customer;
            return true;
        }

        return false;
    }

    public function showChangePassword()
    {
        require __DIR__ . '/../views/change-password.php';
    }
    
    public function changePassword($email, $confirmEmail, $newPassword)
    {
        if ($email !== $confirmEmail) {
            echo "<script>alert('Emails do not match. Please try again.'); window.location.href='/change-password';</script>";
            exit;
        }
    
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $result = $this->customerModel->updatePassword($email, $hashedPassword);
    
        if ($result) {
            echo "<script>alert('Password changed successfully.'); window.location.href='/customer-login';</script>";
        } else {
            echo "<script>alert('Error: Could not change password. Please try again.'); window.location.href='/change-password';</script>";
        }
    }
    

// Method to show the new account form
public function showNewAccountForm()
{
    require __DIR__ . '/../views/customer-newaccount.php';
}

// Method to create a new customer account
public function createAccount($name, $email, $password)
{
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $result = $this->customerModel->create($name, $email, $hashedPassword);

    if ($result) {
        header('Location: /booking_form');
        exit;
    } else {
        echo '<script>alert("Failed to create account. Please try again."); window.location.href="/customer-newaccount";</script>';
    }
}

}
