<?php

class Movie {

    public $id;
    public $title;
    public $code;
    public $description;
    public $duration;
    public $releaseData;
    public $trailer;
    public $imagePath;
    public $coverPath;
    public $director;

    public function __construct($id, $title, $code, $description, $duration, $releaseData, $trailer, $imagePath, $coverPath, $director) {
        $this->id = $id;
        $this->title = $title;
        $this->code = $code;
        $this->description = $description;
        $this->duration = $duration;
        $this->releaseData = $releaseData;
        $this->trailer = $trailer;
        $this->imagePath = $imagePath;
        $this->coverPath = $coverPath;
        $this->director = $director;
    }



}


?>