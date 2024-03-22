<?php

include __DIR__ . '/../Models/show-seats.classes.php';

class ShowSeatsController extends DB {

    public function getSeatsPerShow($showId) {

        $stmt = $this->connect()->prepare("SELECT * FROM show_seats WHERE show_id = ?");
        $stmt->execute([$showId]);
        $showSeats = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $showSeats;
    }

    public function getSeatPerId($id) {

        $stmt = $this->connect()->prepare("SELECT * FROM show_seats WHERE id = ?");

        if(!$stmt->execute([$id])){
            $singleSeat = null;
        } else {
            
            $singleSeatDB = $stmt->fetchAll((PDO::FETCH_ASSOC));
            $singleSeat = new ShowSeats($singleSeatDB[0]['id'], $singleSeatDB[0]['show_id'], $singleSeatDB[0]['seat_number'], $singleSeatDB[0]['row'], $singleSeatDB[0]['price'], $singleSeatDB[0]['is_booked']);
        }

        return $singleSeat;
    }

    public function seatBooked($id) {
        $stmt = $this->connect()->prepare("UPDATE show_seats SET is_booked = 1 WHERE id = ?");
    
        try {
            $stmt->execute([$id]);
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException : " . $e->getMessage());
            return false;
        }
    }

    
}


?>