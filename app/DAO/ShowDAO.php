<?php

namespace App\DAO;
use App\Core\DB;
use PDO;

class ShowDAO extends DB {
    public function getShowsByMovieAndHall($movieId, $hallId) {
        $stmt = $this->connect()->prepare("SELECT * FROM shows WHERE movie_id = ? AND hall_id = ?");
        $stmt->execute([$movieId, $hallId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getShowById($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM shows WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getAllShowWithMovieHallAndSeats() {
        $stmt = $this->connect()->prepare("
        SELECT movies.*, 
               shows.*, 
               halls.name AS hall_name, 
               show_seats.show_id,
               COUNT(show_seats.id) AS total_seats,
               SUM(show_seats.is_booked = 0) AS available_seats
        FROM movies 
        INNER JOIN shows ON movies.id = shows.movie_id
        INNER JOIN halls ON shows.hall_id = halls.id
        INNER JOIN show_seats ON shows.id = show_seats.show_id
        GROUP BY shows.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
