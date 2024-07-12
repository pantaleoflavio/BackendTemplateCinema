<?php

namespace App\Controllers;
use App\DAO\ShowDAO;
use App\Models\Show;

class ShowController {
    private $showDAO;

    public function __construct() {
        $this->showDAO = new ShowDAO();
    }

    public function getShowsByMovieAndHall($movieId, $hallId) {
        return $this->showDAO->getShowsByMovieAndHall($movieId, $hallId);
    }

    
    public function getShowById($id) {
        $showData = $this->showDAO->getShowById($id);
        if ($showData) {
            return new Show($showData->id, $showData->show_time, $showData->show_date, $showData->movie_id, $showData->hall_id);
        }
        
        return null;
    }

    public function getAllShowWithMovieHallAndSeats() {
        return $this->showDAO->getAllShowWithMovieHallAndSeats();
    }
}
