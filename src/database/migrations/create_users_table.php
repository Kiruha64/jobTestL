<?php
// src/database/migrations/create_users_table.php

require_once __DIR__ . '/../../models/Database.php';

function createUsersTable()
{
    $conn = Database::getInstance()->getConnection();

    $sql = "CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(255) NOT NULL,
                last_name VARCHAR(255) NOT NULL,
                email VARCHAR(255) UNIQUE NOT NULL,
                password VARCHAR(255) NOT NULL,
                phone VARCHAR(15) DEFAULT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

    try {
        $conn->exec($sql);
        echo "Table 'users' created successfully.\n";
    } catch (PDOException $e) {
        echo "Failed to create table 'users': " . $e->getMessage() . "\n";
    }
}

createUsersTable();
