<?php

namespace App\DAO;

use App\Core\DB;
use App\Models\User;
use PDO;
use PDOException;

class UserDAO extends DB {
    public function getSingleUser($id) {
        try {
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);
            $userDB = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($userDB) {
                return new User($userDB['id'], $userDB['fullname'], $userDB['email'], $userDB['username'], $userDB['image_path'], $userDB['role']);
            }
            return null;
        } catch (PDOException $e) {
            error_log("PDOException in getSingleUser: " . $e->getMessage());
            return null;
        }
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
