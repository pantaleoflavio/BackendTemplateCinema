<?php

namespace App\DAO;
use App\Core\DB;
use PDO;

class CartDAO extends DB {
    public function getCartProUser($user_id) {
        $stmt = $this->connect()->prepare("SELECT * FROM cart WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function addToCart($movie_id, $hall_id, $show_id, $seat_ids, $user_id) {
        $stmt = $this->connect()->prepare("INSERT INTO cart (movie_id, hall_id, show_id, seat_ids, user_id) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$movie_id, $hall_id, $show_id, $seat_ids, $user_id]);
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
