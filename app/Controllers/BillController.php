<?php

namespace App\Controllers;
use App\DAO\BillDAO;

class BillController {
    private $billDAO;

    public function __construct() {
        $this->billDAO = new BillDAO();
    }

    public function getBillsByUserId($user_id) {
        return $this->billDAO->getBillsByUserId($user_id);
    }

    public function createBill($customer, $adresse, $email, $order_notes, $total, $orderList, $user_id) {
        return $this->billDAO->createBill($customer, $adresse, $email, $order_notes, $total, $orderList, $user_id);
    }
}
