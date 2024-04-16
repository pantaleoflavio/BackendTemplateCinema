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
        return $this->showSeatsDAO->getSeatById($id);
    }

    public function setSeatToBooked($id) {
        return $this->showSeatsDAO->updateSeatToBooked($id);
    }
}
