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

    public function addSingleImage($hallId, $imagePath) {
        return $this->hallImagesDAO->addSingleImage($hallId, $imagePath);
    }

    public function updateSingleImage($imageId, $newImagePath) {
        return $this->hallImagesDAO->updateSingleImage($imageId, $newImagePath);
    }

    public function deleteSingleImage($imageId) {
        return $this->hallImagesDAO->deleteSingleImage($imageId);
    }
}
