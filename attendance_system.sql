CREATE DATABASE attendance_system;
USE attendance_system;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user'
);

-- Attendance table
CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    date DATE NOT NULL,
    status ENUM('Present','Absent') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Example Admin User (password: admin123)
INSERT INTO users (username, password, role) 
VALUES ('admin', MD5('admin123'), 'admin');
