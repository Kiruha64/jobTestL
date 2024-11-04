<?php
// src/models/Database.php

class Database {
    private static $instance = null;
    private $conn;
    private $dsn;
    private $username;
    private $password;

    private function __construct() {
        $config = require __DIR__ . '/../../config/db.php';
        $this->dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        $this->username = $config['username'];
        $this->password = $config['password'];

        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
