<?php

namespace App\Controllers;
use App\Models\User;
use App\DAO\UserDAO;

class UserController {
    private $userDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
    }

    public function getSingleUser($id) {
        return $this->userDAO->getSingleUser($id);
    }

    public function updateUser($id, $fullname, $email, $username, $user_pic) {
        return $this->userDAO->updateUser($id, $fullname, $email, $username, $user_pic);
    }

    public function getAllUsers() {
        return $this->userDAO->getAllUsers();
    }

    public function getUsersByRole($role) {
        return $this->userDAO->getUsersByRole($role);
    }

    public function setRole($user_id, $role) {
        return $this->userDAO->setRole($user_id, $role);
    }
}
