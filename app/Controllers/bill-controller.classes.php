<?php

include __DIR__ . '/../Models/bill.classes.php';

class BillController extends DB {

    public function getBillsProUser($user_id){
        $stmt = $this->connect()->prepare("SELECT * FROM bills WHERE user_id = ?");


        if(!$stmt->execute([$user_id])){
            $bill = null;
        } else {
            
            $bill = $stmt->fetchAll((PDO::FETCH_OBJ));
            
        }

        return $bill;

        
    }

    public function createBill($customer, $adress, $email, $order_notes, $total, $orderList, $user_id){
        $stmt = $this->connect()->prepare("INSERT INTO bills (customer, adress, email, order_notes, total, orderList, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)");

        try {
            $stmt->bindParam(1, $customer);
            $stmt->bindParam(2, $adress);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $order_notes);
            $stmt->bindParam(5, $total);
            $stmt->bindParam(6, $orderList);
            $stmt->bindParam(7, $user_id);
    
            $stmt->execute();
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException in createCart: " . $e->getMessage());
            return false;
        }
        
    }



    
}


?>