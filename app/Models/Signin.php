<?php

namespace App\Models;
use App\Core\DB;
use PDO;

class Signin extends DB {
    protected function getUser($email, $password){
        // Preparazione della query per ottenere la password hashata dall'utente
        $stmt = $this->connect()->prepare("SELECT password FROM users WHERE email = ?");
        if (!$stmt->execute([$email])) {
            $this->redirectWithError("Error, login not possible1", "stmtfailed");
        }

        if ($stmt->rowCount() == 0) {
            $this->redirectWithError("Error, login not possible2", "usernotfound");
        }

        $passHashed = $stmt->fetch(PDO::FETCH_ASSOC);
        $checkPass = password_verify($password, $passHashed["password"]);

        if (!$checkPass) {
            $this->redirectWithError("Username or email are wrong", "invalidcredentials");
        } else {
            // Ottenimento dei dettagli utente dopo la verifica della password
            $this->getUserDetails($email);
        }
    }

    private function getUserDetails($email) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");
        if (!$stmt->execute([$email])) {
            $this->redirectWithError("Error, login not possible3", "stmtfailed");
        }

        if ($stmt->rowCount() == 0) {
            $this->redirectWithError("No user found", "nouser");
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Impostazione delle variabili di sessione
        $_SESSION['userId'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['image_path'] = $user['image_path'];
        $_SESSION['role'] = $user['role'];
    }

    private function redirectWithError($message, $errorType) {
        echo "<script>alert('{$message}'); window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=home?error={$errorType}';</script>";
        exit();
    }
}

?>
