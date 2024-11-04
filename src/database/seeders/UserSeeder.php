<?php
// src/database/seeders/UserSeeder.php

require_once __DIR__ . '/../../models/Database.php';

function seedUsers()
{
    // Get the database connection from the singleton
    $conn = Database::getInstance()->getConnection();

    // Define the SQL to insert a user
    $sql = "INSERT INTO users (first_name, last_name, email, password, phone) VALUES (:first_name, :last_name, :email, :password, :phone)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Sample user data to insert
    $users = [
        [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => password_hash('password123', PASSWORD_DEFAULT), // Hash the password
            'phone' => '1234567890',
        ],
        [
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@example.com',
            'password' => password_hash('password456', PASSWORD_DEFAULT), // Hash the password
            'phone' => '0987654321',
        ],
        // Add more users as needed
    ];

    foreach ($users as $user) {
        // Bind parameters for each user
        $stmt->bindParam(':first_name', $user['first_name']);
        $stmt->bindParam(':last_name', $user['last_name']);
        $stmt->bindParam(':email', $user['email']);
        $stmt->bindParam(':password', $user['password']);
        $stmt->bindParam(':phone', $user['phone']);

        // Execute the insertion
        try {
            if ($stmt->execute()) {
                echo "User '{$user['first_name']} {$user['last_name']}' seeded successfully.\n";
            } else {
                echo "Failed to seed user '{$user['first_name']} {$user['last_name']}'.\n";
            }
        } catch (PDOException $e) {
            echo "Error seeding user '{$user['first_name']} {$user['last_name']}': " . $e->getMessage() . "\n";
        }
    }
}

// Run the seed function
seedUsers();
