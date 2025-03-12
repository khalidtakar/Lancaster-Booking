<?php

namespace Models;

use Core\Database;

class Customer
{
    private $conn;
    private $table = 'customers';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect(); // Initialize the database connection
    }

    // Get all customers
    public function getAll()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updatePassword($email, $hashedPassword)
{
    $query = "UPDATE customers SET password = :password WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    return $stmt->execute([
        ':email' => $email,
        ':password' => $hashedPassword,
    ]);
}

    // Create a new customer
    public function create($name, $email, $password)
    {
        $sql = "INSERT INTO customers (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->conn->prepare($sql); // Use $conn instead of $db
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Find customer by email
    public function findByEmail($email)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query); // Use $conn instead of $db
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
