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

    public function updateMovieTrailer($id, $newTrailerPath) {
        return $this->movieDAO->updateMovieTrailer($id, $newTrailerPath);
    }

    public function clearMovieTrailer($movieId) {
        return $this->movieDAO->clearMovieTrailer($movieId);
    }

    public function updateMoviePicture($movieId, $newPicturePath) {
        return $this->movieDAO->updateMoviePicture($movieId, $newPicturePath);
    }

    public function clearMoviePicture($movieId) {
        return $this->movieDAO->clearMoviePicture($movieId);
    }

    public function updateMovieCover($movieId, $newCoverPath) {
        return $this->movieDAO->updateMovieCover($movieId, $newCoverPath);
    }

    public function clearMovieCover($movieId) {
        return $this->movieDAO->clearMovieCover($movieId);
    }

    public function deleteMovieById($movieId) {
        return $this->movieDAO->deleteMovieById($movieId);
    }
    
    public function addMovie($name, $description, $duration, $release_date, $trailerPath, $imagePath, $coverPath, $director) {
        return $this->movieDAO->addMovie($name, $description, $duration, $release_date, $trailerPath, $imagePath, $coverPath, $director);
    }

    public function updateMovie($movieId, $name, $description, $duration, $release_date, $director) {
        return $this->movieDAO->updateMovie($movieId, $name, $description, $duration, $release_date, $director);
    }

}
