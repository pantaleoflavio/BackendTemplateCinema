<?php

namespace App\Controllers;
use App\DAO\HallImagesDAO;

class HallImagesController {
    private $hallImagesDAO;

    public function __construct() {
        $this->hallImagesDAO = new HallImagesDAO();
    }

    public function getPicsBySingleHall($hallId) {
        return $this->hallImagesDAO->getPicsBySingleHall($hallId);
    }
}
