<?php

namespace App\DAO;
use App\Core\DB;
use PDO;

class BillDAO extends DB {
    public function getBillsByUserId($user_id) {
        $stmt = $this->connect()->prepare("SELECT * FROM bills WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function createBill($customer, $adresse, $email, $order_notes, $total, $orderList, $user_id) {
        $stmt = $this->connect()->prepare("INSERT INTO bills (customer, adress, email, order_notes, total, orderList, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$customer, $adresse, $email, $order_notes, $total, $orderList, $user_id]);
    }
}
