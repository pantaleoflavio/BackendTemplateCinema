<?php

namespace App\DAO;
use App\Core\DB;
use PDO;

class UserDAO extends DB {
    public function getUserById($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updateUser($id, $fullname, $email, $username, $user_pic) {
        $stmt = $this->connect()->prepare("UPDATE users SET fullname=?, email=?, username=?, image_path=? WHERE id=?");
        return $stmt->execute([$fullname, $email, $username, $user_pic, $id]);
    }

    public function getAllUsers() {
        $stmt = $this->connect()->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUsersByRole($role) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE role = ?");
        $stmt->execute([$role]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function setRole($user_id, $role) {
        $stmt = $this->connect()->prepare("UPDATE users SET role = ? WHERE id = ?");
        return $stmt->execute([$role, $user_id]);
    }
}
