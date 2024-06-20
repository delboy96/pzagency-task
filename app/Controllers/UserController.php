<?php

namespace Controllers;

require_once __DIR__ . '/../Models/User.php';

class UserController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new \Models\User($pdo);
    }

    public function index()
    {
        $users = $this->userModel->getAll();
        require 'app/Views/users/index.php';
    }

    public function create()
    {
        require 'app/Views/users/create.php';
    }

    public function store($data)
    {
        $this->userModel->create($data['name'], $data['email'], $data['password']);
        header('Location: /users');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        require 'app/Views/users/edit.php';
    }

    public function update($id, $data)
    {
        $this->userModel->update($id, $data['name'], $data['email']);
        header('Location: /users');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        header('Location: /users');
    }
}