<?php
// src/database/migrations/create_interests_table.php

require_once __DIR__ . '/../../models/Database.php';

function createInterestsTable()
{
    $conn = Database::getInstance()->getConnection();

    $sql = "CREATE TABLE IF NOT EXISTS interests (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL UNIQUE,
        about_me VARCHAR(255) DEFAULT NULL,
        favorite_shows VARCHAR(255) DEFAULT NULL,
        favorite_musics VARCHAR(255) DEFAULT NULL,
        favorite_movies VARCHAR(255) DEFAULT NULL,
        favorite_books VARCHAR(255) DEFAULT NULL,
        games VARCHAR(255) DEFAULT NULL,
        favorite_bloggers VARCHAR(255) DEFAULT NULL,
        computer_games VARCHAR(255) DEFAULT NULL,
        sports VARCHAR(255) DEFAULT NULL,
        color VARCHAR(255) DEFAULT NULL,
        figure VARCHAR(255) DEFAULT NULL,
        religion VARCHAR(255) DEFAULT NULL,
        hobby VARCHAR(255) DEFAULT NULL,
        clothing_style VARCHAR(255) DEFAULT NULL,
        favorite_vehicle VARCHAR(255) DEFAULT NULL,
        favorite_os VARCHAR(255) DEFAULT NULL,
        bad_habits VARCHAR(255) DEFAULT NULL,
        personality_type VARCHAR(255) DEFAULT NULL,
        what_add_education VARCHAR(255) DEFAULT NULL,
        money_or_happiness VARCHAR(255) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )";

    try {
        $conn->exec($sql);
        echo "Table 'interests' created successfully.\n";
    } catch (PDOException $e) {
        echo "Failed to create table 'interests': " . $e->getMessage() . "\n";
    }
}


// Run the function to create the table
createInterestsTable();
