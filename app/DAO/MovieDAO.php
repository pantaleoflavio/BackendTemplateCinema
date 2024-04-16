<?php

namespace App\DAO;

use App\Core\DB;
use App\Models\Movie;
use PDO;
use PDOException;

class MovieDAO extends DB {

    public function getAllMovies() {
        $stmt = $this->connect()->prepare("SELECT * FROM movies");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getMovieById($id) {
        try {
            $stmt = $this->connect()->prepare("SELECT * FROM movies WHERE id=?");
            $stmt->execute([$id]);
            $movieDB = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($movieDB) {
                return new Movie($movieDB['id'], $movieDB['name'], $movieDB['code'], $movieDB['description'], $movieDB['duration'], $movieDB['release_date'], $movieDB['trailer'], $movieDB['image_path'], $movieDB['cover_path'], $movieDB['director']);
            }
            return null;
        } catch (PDOException $e) {
            error_log("PDOException in getSingleUser: " . $e->getMessage());
            return null;
        } 
    }
}
