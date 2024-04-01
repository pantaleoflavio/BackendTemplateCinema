<?php
 require_once __DIR__ . '/../../vendor/autoload.php';
 $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
 $dotenv->load();

class DB {

    protected function connect (){
        try { 
            // host
            $localHost = $_ENV['DB_HOST'];

            // dbname
            $dbname = $_ENV['DB_NAME'];
    
            // user
            $user = $_ENV['DB_USER'];

            // pass
            $pass = $_ENV['DB_PASS'];
    
            $conn = new PDO("mysql:host=".$localHost.";dbname=".$dbname.";",$user, $pass);
            return $conn;
    
    
        } catch (PDOException $e) {
            echo $e->getMessage() . "<br>";
            die();
        }
    }

}
?>