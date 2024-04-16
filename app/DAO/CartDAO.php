<?php

namespace App\DAO;
use App\Core\DB;
use PDO;
use PDOException;

class CartDAO extends DB {
    public function getCartProUser($user_id) {
        $stmt = $this->connect()->prepare("SELECT * FROM cart WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function addToCart($movie_id, $hall_id, $show_time_id, $seat_ids, $user_id) {
        $stmt = $this->connect()->prepare("INSERT INTO cart (movie_id, hall_id, show_time_id, seat_ids, user_id) VALUES (?, ?, ?, ?, ?)");

        try {
            $stmt->bindParam(1, $movie_id);
            $stmt->bindParam(2, $hall_id);
            $stmt->bindParam(3, $show_time_id);
            $stmt->bindParam(4, $seat_ids);
            $stmt->bindParam(5, $user_id);
    
            $stmt->execute();
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException in createCart: " . $e->getMessage());
            return false;
        }
    }

    public function removeFromCart($id) {
        $stmt = $this->connect()->prepare("DELETE FROM cart WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function emptyCart($user_id) {
        $stmt = $this->connect()->prepare("DELETE FROM cart WHERE user_id = ?");
        return $stmt->execute([$user_id]);
    }
}
