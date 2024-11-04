<?php
// src/controllers/UserController.php

namespace services;
use Database;

require_once __DIR__ . '/../models/Database.php';

class UserService
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getUser($userId)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function getUserWithDetails($userId)
    {
        $sql = "
            SELECT 
                u.*, 
                up.*, 
                i.* 
            FROM 
                users u
            LEFT JOIN 
                user_profiles up ON u.id = up.user_id
            LEFT JOIN 
                interests i ON u.id = i.user_id
            WHERE 
                u.id = :id
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        // If date_of_birth is set, split it into components
        if (!empty($user['date_of_birth'])) {
            $date = new \DateTime($user['date_of_birth']);
            $user['day_of_birth'] = $date->format('d');
            $user['month_of_birth'] = $date->format('m');
            $user['year_of_birth'] = $date->format('Y');
        }

        return $user;
    }

    public function showForm()
    {
        require_once __DIR__ . '/../views/form.php';
    }

}
