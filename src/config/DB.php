<?php

namespace App\config;

use PDO;
use PDOException;

class DB
{
    private static $instance = null;
    private $conn;
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $charset = 'utf8mb4';

    private function __construct() {
        $this->host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_DATABASE'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];

        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            // Xử lý lỗi kết nối một cách phù hợp (log, hiển thị thông báo, ...)
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    // Ngăn chặn clone và unserialize để đảm bảo Singleton
    private function __clone() {}
    public function __wakeup() {}
}