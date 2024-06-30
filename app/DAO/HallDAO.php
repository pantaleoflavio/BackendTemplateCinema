<?php

namespace App\DAO;
use App\Core\DB;
use PDO;
use PDOException;

class HallDAO extends DB {
    public function getAllHalls() {
        $stmt = $this->connect()->prepare("SELECT * FROM halls");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getHallById($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM halls WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addHall($name, $code, $seats, $coverPath, $services) {
        try {
            $sql = "INSERT INTO halls (name, code, seats, cover_path, services) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name, $code, $seats, $coverPath, $services]);
    
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("PDOException in addHall: " . $e->getMessage());
            return false;
        }
    }

    public function clearHallPicture($hallId) {
        try {
            $sql = "UPDATE halls SET cover_path = NULL WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$hallId]);
            return $stmt->rowCount(); 
        } catch (PDOException $e) {
            error_log("PDOException in clearHallPicture: " . $e->getMessage());
            return false;
        }
    }

    public function updateHallPicture($hallId, $newCoverPath) {
        try {
            $sql = "UPDATE halls SET cover_path = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$newCoverPath, $hallId]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("PDOException in updateHallPicture: " . $e->getMessage());
            return false;
        }
    }

    public function deleteHallById($hallId) {
        try {

            $sql = "DELETE FROM halls WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
    
            $stmt->execute([$hallId]);
    
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("PDOException in deleteHallById: " . $e->getMessage());
            return false;
        }
    }

}
