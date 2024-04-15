<?php

namespace App\Controllers;

use App\DAO\MovieDAO;

class MovieController {

    private $movieDAO;

    public function __construct() {
        $this->movieDAO = new movieDAO();
    }

    public function getAllMovies(){
        return $this->movieDAO->getAllMovies();
    }

    public function getMovieById($id){
        return $this->movieDAO->getMovieById($id);
    }
}
