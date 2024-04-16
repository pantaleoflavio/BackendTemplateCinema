<?php

namespace App\Models;

class HallImages {

    public $id;
    public $hallId;
    public $imagePath;

    public function __construct($id, $hallId, $imagePath) {
        $this->id = $id;
        $this->hallId = $hallId;
        $this->imagePath = $imagePath;
    }



}


?>