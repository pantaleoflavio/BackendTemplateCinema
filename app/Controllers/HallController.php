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

    public function clearHallPicture($hallId) {
        return $this->hallDAO->clearHallPicture($hallId);
    }

    public function updateHallPicture($hallId, $newCoverPath) {
        return $this->hallDAO->updateHallPicture($hallId, $newCoverPath);
    }

    public function addHall($name, $code, $seats, $coverPath, $services) {
        return $this->hallDAO->addHall($name, $code, $seats, $coverPath, $services);
    }

    public function deleteHallById($hallId) {
        return $this->hallDAO->deleteHallById($hallId);
    }
}
