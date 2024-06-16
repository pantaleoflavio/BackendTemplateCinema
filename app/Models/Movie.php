<?php

namespace App\Models;

class Movie {

    public $id;
    public $title;
    public $description;
    public $duration;
    public $releaseDate;
    public $trailer;
    public $imagePath;
    public $coverPath;
    public $director;

    public function __construct($id, $title, $description, $duration, $releaseDate, $trailer, $imagePath, $coverPath, $director) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->duration = $duration;
        $this->releaseDate = $releaseDate;
        $this->trailer = $trailer;
        $this->imagePath = $imagePath;
        $this->coverPath = $coverPath;
        $this->director = $director;
    }



}


?>