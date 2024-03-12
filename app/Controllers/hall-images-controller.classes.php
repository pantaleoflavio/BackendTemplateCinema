<?php

include __DIR__ . '/../Models/hall-images.classes.php';

class HallImagesController extends DB {


    public function getPicsBySingleHall($id){

        $stmt = $this->connect()->prepare("SELECT image_path FROM hall_images WHERE hall_id=?");

        if(!$stmt->execute([$id])){
            $hallImages = null;
        } else {
            
            $hallImages = $stmt->fetchAll((PDO::FETCH_OBJ));

        }

        return $hallImages;
        
    }



    
}


?>