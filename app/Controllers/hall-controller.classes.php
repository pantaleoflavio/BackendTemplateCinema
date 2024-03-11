<?php

include "../Models/hall.classes.php";

class HallController extends DB {

    public function getAllHalls(){
        $stmt = $this->connect()->prepare("SELECT * FROM halls");

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $halls = $stmt->fetchAll((PDO::FETCH_OBJ));
        return $halls;
        
    }


    public function getHallById($id){
        $stmt = $this->connect()->prepare("SELECT * FROM halls WHERE id=?");

        if(!$stmt->execute([$id])){
            $singleHall = null;
        } else {
            
            $singleHallDB = $stmt->fetchAll((PDO::FETCH_ASSOC));
            $singleHall = new Hall($singleHallDB[0]['id'], $singleHallDB[0]['name'], $singleHallDB[0]['code'], $singleHallDB[0]['seats'], $singleHallDB[0]['cover_path'], $singleHallDB[0]['services']);
        }

        return $singleHall;
        
    }

    
}


?>