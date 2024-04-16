<?php

namespace App\DAO;
use App\Core\DB;
use App\Models\ShowSeats;
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
        $seatData =  $stmt->fetch(PDO::FETCH_OBJ);
        if ($seatData) {
            return new ShowSeats($seatData->id, $seatData->show_id, $seatData->seat_number, $seatData->row, $seatData->price, $seatData->is_booked);
        }
        return null;
    }

    public function updateSeatToBooked($id) {
        $stmt = $this->connect()->prepare("UPDATE show_seats SET is_booked = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
