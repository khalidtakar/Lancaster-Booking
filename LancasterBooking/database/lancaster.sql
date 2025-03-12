-- Create the database
CREATE DATABASE lancaster_booking;

-- Use the database
USE lancaster_booking;

-- Table for customers
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- Hashed password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for staff
CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- Hashed password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for bookings
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    party_size INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    quantity INT,
    phone VARCHAR(20) NOT NULL,
    order_item VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    service ENUM('breakfast', 'lunch', 'dinner') NOT NULL,
    date_time DATETIME NOT NULL,
    address TEXT,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Table for service availability
CREATE TABLE service_availability (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service ENUM('breakfast', 'lunch', 'dinner') NOT NULL,
    available_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    max_tables INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
