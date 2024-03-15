<?php
    class Signup extends DB {

        protected function setUser($fullname, $email, $username, $image, $password) {
            // Preparazione della query con segnaposto nominativi per maggiore chiarezza
            $sql = "INSERT INTO users (fullname, email, username, image_path, password) VALUES (:fullname, :email, :username, :image_path, :password)";
            
            try {
                $stmt = $this->connect()->prepare($sql);
        
                // Hash della password
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        
                // Binding dei parametri utilizzando segnaposto nominativi
                $stmt->bindParam(':fullname', $fullname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':image_path', $image);
                $stmt->bindParam(':password', $hashedPass);
        
                $stmt->execute();
            } catch (PDOException $e) {
                // Gestione dell'errore con log o redirect, a seconda delle esigenze
                error_log("Errore durante l'inserimento dell'utente: " . $e->getMessage());
                header("location: ../../resources/View/index.php?error=stmtfailed");
                exit();
            } finally {
                // Assicurazione che lo statement sia chiuso correttamente
                $stmt = null;
            }
        }
        

        protected function checkUser($email){
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?;");
        
            if(!$stmt->execute(array($email))){
                $stmt = null;
                header("location: ../../resources/View/index.php?error=stmtfailed");
                exit();
            }

            $resultCheck;
            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            } else {
                $resultCheck = true;
            }

            return $resultCheck;
        }
    }
 
?>