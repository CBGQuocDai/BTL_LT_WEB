<?php

namespace App\dao;

use App\config\DB;
class UserDAO {
    private $conn;

    public function __construct() {
        $this->conn = DB::getInstance()->getConnection();
    }

    public function getAllUsers() {
        $stmt = $this->conn->query("SELECT * FROM users");
        // Xử lý kết quả, có thể trả về mảng các đối tượng User
        return $stmt->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        return $stmt->fetch();
    }

    // Thêm các phương thức khác: createUser, updateUser, deleteUser, ...
}