<?php

class Show {

    public $showId;
    public $showTime;
    public $showDate;
    public $movieId;
    public $hallId;

    public function __construct($showId, $showTime, $showDate, $movieId, $hallId ) {
        $this->showId = $showId;
        $this->showTime = $showTime;
        $this->showDate = $showDate;
        $this->movieId = $movieId;
        $this->hallId = $hallId;
    }


}


?>