<?php
// src/models/User.php

require_once __DIR__ . '/Database.php';

class User
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function create($first_name, $last_name, $email, $password, $phone = null)
    {
        $sql = "INSERT INTO users (first_name, last_name, email, password, phone) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$first_name, $last_name, $email, password_hash($password, PASSWORD_DEFAULT), $phone]);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($userId, $data)
    {
        $sql = "UPDATE users SET 
            phone = :phone,
            email = :email,
            first_name = :first_name,
            last_name = :last_name
            WHERE id = :user_id";

        $stmt = $this->conn->prepare($sql);
        $data['user_id'] = $userId;
        return $stmt->execute($data);
    }


    // Add methods for transactions
    public function beginTransaction()
    {
        $this->conn->beginTransaction();
    }

    public function commit()
    {
        $this->conn->commit();
    }

    public function rollBack()
    {
        $this->conn->rollBack();
    }
}
