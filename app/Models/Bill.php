<?php
namespace App\Models;
class Bill {

    public $id;
    public $customer;
    public $adresse;
    public $email;
    public $order_notes;
    public $total;
    public $orderList;
    public $user_id;
    public $deliveryStatus;
    public $createdAt;


    public function __construct($id, $customer, $adresse, $email, $order_notes, $total, $orderList, $user_id, $deliveryStatus, $createdAt) {
        $this->id = $id;
        $this->customer = $customer;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->order_notes = $order_notes;
        $this->total = $total;
        $this->orderList = $orderList;
        $this->user_id = $user_id;
        $this->deliveryStatus = $deliveryStatus;
        $this->createdAt = $createdAt;
    }


    
}

?>