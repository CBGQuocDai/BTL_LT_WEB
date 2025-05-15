<?php

namespace App\controller;

use App\dao\UserDAO;

class UserController
{
    private $userDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
    }

    public function index() {
        $users = $this->userDAO->getAllUsers();

    }

    public function show($id) {
        $user = $this->userDAO->getUserById($id);

    }
}