-- Tạo cơ sở dữ liệu nếu chưa có
CREATE DATABASE IF NOT EXISTS register_japanhouse;

USE register_japanhouse;

-- Tạo bảng 'USERS'
CREATE TABLE USERS (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    code int(10),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);