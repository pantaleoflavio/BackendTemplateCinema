<?php

include __DIR__ . '/../Models/show.classes.php';

class ShowController extends DB {

    public function getShowsByMovieAndHall($movieId, $hallId) {

        $stmt = $this->connect()->prepare("SELECT * FROM shows WHERE movie_id = ? AND hall_id = ?");
        $stmt->execute([$movieId, $hallId]);
        $showtimes = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $showtimes;
    }

    public function getShowById($id) {

        $stmt = $this->connect()->prepare("SELECT * FROM shows WHERE id = ?");

        if(!$stmt->execute([$id])){
            $singleShow = null;
        } else {
            
            $singleShowDB = $stmt->fetchAll((PDO::FETCH_ASSOC));
            $singleShow = new Show($singleShowDB[0]['id'], $singleShowDB[0]['show_date'], $singleShowDB[0]['show_time'], $singleShowDB[0]['movie_id'], $singleShowDB[0]['hall_id']);
        }

        return $singleShow;
    }

    
}


?>