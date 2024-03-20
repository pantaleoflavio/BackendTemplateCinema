<?php

class ShowSeats {

    public $id;
    public $showId;
    public $seatNumber;
    public $row;
    public $price;
    public $isBooked;

    public function __construct($id, $showId, $seatNumber, $row, $price, $isBooked) {
        $this->id = $id;
        $this->showId = $showId;
        $this->seatNumber = $seatNumber;
        $this->row = $row;
        $this->price = $price;
        $this->$isBooked = $isBooked;
    }


}


?>