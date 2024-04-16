<?php

namespace App\Models;

class Hall {

    public $id;
    public $name;
    public $code;
    public $seats;
    public $coverPath;
    public $services;

    public function __construct($id, $name, $code, $seats, $coverPath, $services) {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->seats = $seats;
        $this->coverPath = $coverPath;
        $this->services = $services;
    }



}


?>