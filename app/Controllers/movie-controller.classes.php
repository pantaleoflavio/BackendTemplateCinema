<?php

include __DIR__ . '/../Models/movie.classes.php';

class MovieController extends DB {

    public function getAllMovies(){
        $stmt = $this->connect()->prepare("SELECT * FROM movies");

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $movies = $stmt->fetchAll((PDO::FETCH_OBJ));
        return $movies;
        
    }

    public function getMovieById($id){
        $stmt = $this->connect()->prepare("SELECT * FROM movies WHERE id=?");

        if(!$stmt->execute([$id])){
            $singleMovie = null;
        } else {
            
            $singleMovieDB = $stmt->fetchAll((PDO::FETCH_ASSOC));
            $singleMovie = new Movie($singleMovieDB[0]['id'], $singleMovieDB[0]['name'], $singleMovieDB[0]['code'], $singleMovieDB[0]['description'], $singleMovieDB[0]['duration'], $singleMovieDB[0]['release_date'], $singleMovieDB[0]['trailer'], $singleMovieDB[0]['image_path'], $singleMovieDB[0]['cover_path'], $singleMovieDB[0]['director']);
        }

        return $singleMovie;
        
    }


    
}


?>