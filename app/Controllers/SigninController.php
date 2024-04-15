<?php
namespace App\Controllers;
use App\Models\Signin;

class SigninController extends Signin {

    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password; 
    }

    public function loginUser() {
      if ($this->emptyInput() == false) {
        // echo "Empty Input";
        echo "<script>alert('Username or email are wrong');</script>";
        exit();
      }

      $this->getUser($this->email, $this->password);
    }

    private function emptyInput() {
        $result;
        if (empty($this->email) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

   
}
?>