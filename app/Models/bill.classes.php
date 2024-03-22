<?php

class Bill {

    public $id;
    public $customer;
    public $company;
    public $adresse;
    public $city;
    public $country;
    public $zip;
    public $email;
    public $phone;
    public $order_notes;
    public $user_id;
    public $total;
    public $productList;
    public $deliveryStatus;


    public function __construct($id, $customer, $adresse, $email, $order_notes, $user_id, $total, $productList, $deliveryStatus) {
        $this->id = $id;
        $this->customer = $customer;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->order_notes = $order_notes;
        $this->user_id = $user_id;
        $this->total = $total;
        $this->productList = $productList;
        $this->deliveryStatus = $deliveryStatus;
    }


    
}

?>