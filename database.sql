CREATE DATABASE portfolio_pro;
USE portfolio_pro;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) UNIQUE,
password VARCHAR(255),
role ENUM('admin','editor') DEFAULT 'editor'
);

CREATE TABLE posts (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
content TEXT
);

CREATE TABLE contacts (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100),
message TEXT
);

-- Default admin password: admin123
INSERT INTO users (username,password,role) VALUES
('admin','$2y$10$wH8QFzXqQ8bYbKJ6Q7nP8eG9o7nXjvF9YzGkXjYp9KzQmV2pQe6G2','admin');
