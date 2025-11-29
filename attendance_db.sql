CREATE DATABASE attendance_db;
USE attendance_db;

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    church VARCHAR(255) NOT NULL,
    assembly VARCHAR(255) NOT NULL,
    contact VARCHAR(50),
    registration_date DATE NOT NULL
);

