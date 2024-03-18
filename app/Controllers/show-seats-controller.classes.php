<?php

include __DIR__ . '/../Models/show-seats.classes.php';

class ShowSeatsController extends DB {

    public function getSeatsPerShow($showId) {

        $stmt = $this->connect()->prepare("SELECT * FROM show_seats WHERE show_id = ?");
        $stmt->execute([$showId]);
        $showSeats = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $showSeats;
    }

    
}


?>