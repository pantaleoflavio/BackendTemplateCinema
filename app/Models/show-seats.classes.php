<?php

class ShowSeats {

    public $id;
    public $showId;
    public $seatNumber;
    public $row;
    public $isBooked;

    public function __construct($id, $showId, $seatNumber, $row, $isBooked) {
        $this->id = $id;
        $this->showId = $showId;
        $this->seatNumber = $seatNumber;
        $this->row = $row;
        $this->$isBooked = $isBooked;
    }


}


?>