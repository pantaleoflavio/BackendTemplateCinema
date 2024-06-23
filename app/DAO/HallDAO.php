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

}
