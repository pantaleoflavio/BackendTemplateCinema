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
                return new Movie($movieDB['id'], $movieDB['name'], $movieDB['description'], $movieDB['duration'], $movieDB['release_date'], $movieDB['trailer'], $movieDB['image_path'], $movieDB['cover_path'], $movieDB['director']);
            }
            return null;
        } catch (PDOException $e) {
            error_log("PDOException in getSingleUser: " . $e->getMessage());
            return null;
        } 
    }

    public function updateMovieTrailer($movieId, $newTrailerPath) {
        try {
            $sql = "UPDATE movies SET trailer = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$newTrailerPath, $movieId]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("PDOException in updateMovieTrailer: " . $e->getMessage());
            return false;
        }
    }

    public function clearMovieTrailer($movieId) {
        try {
            $sql = "UPDATE movies SET trailer = NULL WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$movieId]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("PDOException in clearMovieTrailer: " . $e->getMessage());
            return false;
        }
    }

    public function updateMoviePicture($movieId, $newPicturePath) {
        try {
            $sql = "UPDATE movies SET image_path = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$newPicturePath, $movieId]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("PDOException in updateMoviePicture: " . $e->getMessage());
            return false;
        }
    }

    public function clearMoviePicture($movieId) {
        try {
            $sql = "UPDATE movies SET image_path = NULL WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$movieId]);
            return $stmt->rowCount(); 
        } catch (PDOException $e) {
            error_log("PDOException in clearMoviePicture: " . $e->getMessage());
            return false;
        }
    }

    public function updateMovieCover($movieId, $newCoverPath) {
        try {
            $sql = "UPDATE movies SET cover_path = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$newCoverPath, $movieId]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("PDOException in updateMovieCover: " . $e->getMessage());
            return false;
        }
    }

    public function clearMovieCover($movieId) {
        try {
            $sql = "UPDATE movies SET cover_path = NULL WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$movieId]);
            return $stmt->rowCount(); 
        } catch (PDOException $e) {
            error_log("PDOException in clearMovieCover: " . $e->getMessage());
            return false;
        }
    }

    public function deleteMovieById($movieId) {
        try {

            $sql = "DELETE FROM movies WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
    
            $stmt->execute([$movieId]);
    
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("PDOException in deleteMovieById: " . $e->getMessage());
            return false;
        }
    }

    public function addMovie($name, $description, $duration, $release_date, $trailerPath, $imagePath, $coverPath, $director) {
        try {
            $sql = "INSERT INTO movies (name, description, duration, release_date, trailer, image_path, cover_path, director) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name, $description, $duration, $release_date, $trailerPath, $imagePath, $coverPath, $director]);
    
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("PDOException in addMovie: " . $e->getMessage());
            return false;
        }
    }
    
    public function updateMovie($movieId, $name, $description, $duration, $release_date, $director) {
        try {

            $sql = "UPDATE movies SET name = ?, description = ?, duration = ?, release_date = ?, director = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name, $description, $duration, $release_date, $director, $movieId]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("PDOException in updateMovie: " . $e->getMessage());
            return false;
        }
    }
    
}
