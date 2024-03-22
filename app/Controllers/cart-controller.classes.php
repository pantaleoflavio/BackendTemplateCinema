<?php

include __DIR__ . '/../Models/cart.classes.php';

class CartController extends DB {

    public function getCartProUser($user_id){
        $stmt = $this->connect()->prepare("SELECT * FROM cart WHERE user_id = ?");


        if(!$stmt->execute([$user_id])){
            $cart = null;
        } else {
            
            $cart = $stmt->fetchAll((PDO::FETCH_OBJ));
            
        }

        return $cart;

        
    }

    public function createCart( $movie_id, $hall_id, $show_id, $seat_ids, $user_id){
        $stmt = $this->connect()->prepare("INSERT INTO cart (movie_id, hall_id, show_time_id, seat_ids, user_id) VALUES (?, ?, ?, ?, ?)");

        try {
            $stmt->bindParam(1, $movie_id);
            $stmt->bindParam(2, $hall_id);
            $stmt->bindParam(3, $show_id);
            $stmt->bindParam(4, $seat_ids);
            $stmt->bindParam(5, $user_id);
    
            $stmt->execute();
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException in createCart: " . $e->getMessage());
            return false;
        }
        
    }

    public function deleteElementFromCart($id){
        $stmt = $this->connect()->prepare("DELETE FROM cart WHERE id = ?");

        try {
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return true; // Successo

        } catch (PDOException $e) {
            error_log("PDOException in deleteProductCart: " . $e->getMessage());
            return false;
        }
        
    }

    
}


?>