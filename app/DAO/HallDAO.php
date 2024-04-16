<?php

namespace App\DAO;
use App\Core\DB;
use PDO;

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
}
