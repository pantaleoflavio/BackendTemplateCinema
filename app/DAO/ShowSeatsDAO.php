<?php

namespace App\DAO;
use App\Core\DB;
use PDO;

class ShowSeatsDAO extends DB {
    public function getSeatsByShowId($showId) {
        $stmt = $this->connect()->prepare("SELECT * FROM show_seats WHERE show_id = ?");
        $stmt->execute([$showId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSeatById($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM show_seats WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updateSeatToBooked($id) {
        $stmt = $this->connect()->prepare("UPDATE show_seats SET is_booked = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
