<?php

class Cart {

    public $id;
    public $movie_id;
    public $hall_id;
    public $show_id;
    public $seat_id;
    public $user_id;

    public function __construct($id, $movie_id, $hall_id, $show_id, $seat_id, $user_id) {
        $this->id = $id;
        $this->movie_id = $movie_id;
        $this->hall_id = $hall_id;
        $this->show_id = $show_id;
        $this->seat_id = $seat_id;
        $this->user_id = $user_id;
    }


    
}

?>