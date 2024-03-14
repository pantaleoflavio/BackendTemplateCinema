<?php

include __DIR__ . '/../Models/show.classes.php';

class ShowController extends DB {

    public function getShowsByMovieAndHall($movieId, $hallId) {

        $stmt = $this->connect()->prepare("SELECT * FROM shows WHERE movie_id = ? AND hall_id = ?");
        $stmt->execute([$movieId, $hallId]);
        $showtimes = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $showtimes;
    }

    
}


?>