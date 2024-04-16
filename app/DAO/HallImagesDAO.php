<?php

namespace App\DAO;
use App\Core\DB;
use PDO;

class HallImagesDAO extends DB {
    public function getPicsBySingleHall($hallId) {
        $stmt = $this->connect()->prepare("SELECT * FROM hall_images WHERE hall_id=?");
        $stmt->execute([$hallId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
