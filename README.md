# Secure PHP Login System

A simple **PHP Login System** with **PDO Prepared Statements** to prevent **SQL Injection** vulnerabilities.  
This project demonstrates a secure and minimal login form using PHP, PDO, and MySQL.

## 🚀 Features

- Secure user authentication using **PDO Prepared Statements**
- Styled and responsive login form with **HTML & CSS**
- Safe display of user information with **htmlspecialchars**
- Clear error and success messages

## 🛠️ Tech Stack

- PHP 7.x or higher
- MySQL / MariaDB
- PDO (PHP Data Objects)
- HTML & CSS

## 📂 Project Structure

/project-root
├── config.php
├── login.php (main login file)
└── README.md

## ⚙️ Setup Instructions

1. **Clone the repository**
   ```
   git clone https://github.com/your-username/secure-php-login.git
   cd secure-php-login
## Create a MySQL database and users table
CREATE DATABASE login_db;
USE login_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    is_admin BOOLEAN DEFAULT 0
);

INSERT INTO users (username, password, email, is_admin) VALUES
('admin', 'admin123', 'admin@example.com', 1),
('user', 'user123', 'user@example.com', 0);

🔒 Security Notes
This project uses plaintext passwords for demonstration only.
In production, always store passwords using password_hash() and verify with password_verify().

Prepared Statements are implemented to prevent SQL Injection.

Always validate and sanitize user input as an extra layer of security.


