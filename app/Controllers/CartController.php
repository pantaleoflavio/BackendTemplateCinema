<?php

namespace App\Controllers;
use App\DAO\CartDAO;

class CartController {
    private $cartDAO;

    public function __construct() {
        $this->cartDAO = new CartDAO();
    }

    public function getCartProUser($user_id) {
        return $this->cartDAO->getCartProUser($user_id);
    }

    public function addToCart($movie_id, $hall_id, $show_time_id, $seat_ids, $user_id) {
        return $this->cartDAO->addToCart($movie_id, $hall_id, $show_time_id, $seat_ids, $user_id);
    }

    public function removeFromCart($id) {
        return $this->cartDAO->removeFromCart($id);
    }

    public function emptyCart($user_id) {
        return $this->cartDAO->emptyCart($user_id);
    }
}
