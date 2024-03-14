<?php

class Show {

    public $showId;
    public $movieId;
    public $hallId;
    public $showtime;

    public function __construct($showId, $movieId, $hallId, $showtime) {
        $this->showId = $showId;
        $this->movieId = $movieId;
        $this->hallId = $hallId;
        $this->showtime = $showtime;
    }


}


?>