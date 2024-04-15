<?php

namespace App\Controllers;
use App\DAO\ShowSeatsDAO;
use App\Models\ShowSeats;

class ShowSeatsController {
    private $showSeatsDAO;

    public function __construct() {
        $this->showSeatsDAO = new ShowSeatsDAO();
    }

    public function getSeatsByShowId($showId) {
        return $this->showSeatsDAO->getSeatsByShowId($showId);
    }

    public function getSeatById($id) {
        $seatData = $this->showSeatsDAO->getSeatById($id);
        if ($seatData) {
            return new ShowSeats($seatData->id, $seatData->show_id, $seatData->seat_number, $seatData->row, $seatData->price, $seatData->is_booked);
        }
        return null;
    }

    public function setSeatToBooked($id) {
        return $this->showSeatsDAO->updateSeatToBooked($id);
    }
}
