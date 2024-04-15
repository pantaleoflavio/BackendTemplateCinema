<?php

namespace App\Controllers;
use App\Models\Hall;
use App\DAO\HallDAO;

class HallController {
    private $hallDAO;

    public function __construct() {
        $this->hallDAO = new hallDAO();
    }

    public function getAllHalls() {
        return $this->hallDAO->getAllHalls();
    }

    public function getHallById($id) {
        $hallData = $this->hallDAO->getHallById($id);
        if ($hallData) {
            return new Hall($hallData->id, $hallData->name, $hallData->code, $hallData->seats, $hallData->cover_path, $hallData->services);
        }
        return null;
    }
}
