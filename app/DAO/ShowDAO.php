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
}
