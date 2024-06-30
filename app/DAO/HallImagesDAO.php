<?php

namespace App\DAO;
use App\Core\DB;
use PDO;
use PDOException;

class HallImagesDAO extends DB {

    public function getPicsBySingleHall($hallId) {
        $stmt = $this->connect()->prepare("SELECT * FROM hall_images WHERE hall_id=?");
        $stmt->execute([$hallId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function addSingleImage($hallId, $imagePath) {
        try {
            $stmt = $this->connect()->prepare("INSERT INTO hall_images (hall_id, image_path) VALUES (?, ?)");
            $stmt->execute([$hallId, $imagePath]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("PDOException in addSingleImage: " . $e->getMessage());
            return false;
        }
    }

    public function updateSingleImage($imageId, $newImagePath) {
        try {
            $stmt = $this->connect()->prepare("UPDATE hall_images SET image_path = ? WHERE id = ?");
            $stmt->execute([$newImagePath, $imageId]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("PDOException in updateSingleImage: " . $e->getMessage());
            return false;
        }
    }

    public function deleteSingleImage($imageId) {
        try {
            $stmt = $this->connect()->prepare("DELETE FROM hall_images WHERE id = ?");
            $stmt->execute([$imageId]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("PDOException in deleteSingleImage: " . $e->getMessage());
            return false;
        }
    }
}
