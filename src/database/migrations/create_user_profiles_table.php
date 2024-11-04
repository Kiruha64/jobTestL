<?php
// src/database/migrations/create_user_profiles_table.php

require_once __DIR__ . '/../../models/Database.php';

function createUserProfilesTable()
{
    $conn = Database::getInstance()->getConnection();
//                gender ENUM('male', 'female', 'other') DEFAULT 'other',
    $sql = "CREATE TABLE IF NOT EXISTS user_profiles (
                user_id INT PRIMARY KEY,
                date_of_birth DATE DEFAULT NULL,
                place_of_birth VARCHAR(255) DEFAULT NULL,
                residence VARCHAR(255) DEFAULT NULL,
                gender VARCHAR(255) DEFAULT NULL,
                marital_status VARCHAR(255) DEFAULT NULL,
                blood_type VARCHAR(255) DEFAULT NULL,
                school VARCHAR(255) DEFAULT NULL,
                university VARCHAR(255) DEFAULT NULL,
                additional_education VARCHAR(255) DEFAULT NULL,
                additional_organization VARCHAR(255) DEFAULT NULL,
                profession VARCHAR(255) DEFAULT NULL,
                workplace VARCHAR(255) DEFAULT NULL,
                languages VARCHAR(255) DEFAULT NULL,
                driving_license VARCHAR(255) DEFAULT NULL,
                about_me TEXT DEFAULT NULL,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            )";

    try {
        $conn->exec($sql);
        echo "Table 'user_profiles' created successfully.\n";
    } catch (PDOException $e) {
        echo "Failed to create table 'user_profiles': " . $e->getMessage() . "\n";
    }
}

createUserProfilesTable();
