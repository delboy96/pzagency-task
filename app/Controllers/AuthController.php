<?php

namespace Controllers;

use Models\User;
use Validators\Validator;

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Validators/Validator.php';
class AuthController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function login_page()
    {
        require '../app/Views/auth/login.blade.php';
    }

    public function register_page()
    {
        require '../app/Views/auth/register.blade.php';
    }

    public function register($email, $name, $password)
    {
        $data = [];

        if (!Validator::validateEmail($email)) {
            $data['error'] = 'Please enter a valid email address.';
            return $data;
        }
        if (!Validator::validateName($name)) {
            $data['error'] = 'Name must have between 3 and 30 characters.';
            return $data;
        }
        if (!Validator::validatePassword($password)) {
            $data['error'] = 'Password must have between 3 and 30 characters.';
            return $data;
        }

        if($this->userModel->findByEmail($email))
        {
            $data['error'] = 'User with that email already exists.';
            return $data;
        }

        try {
            $this->userModel->create($name, $email, $password);
            $data['success'] = 'Registered successfully!';
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }
        return $data;
    }

    public function login($email, $password)
    {
        $data = [];

        if (!Validator::validateEmail($email)) {
            $data['error'] = 'Please enter a valid email address.';
            return $data;
        }

        if (!Validator::validatePassword($password)) {
            $data['error'] = 'Password must have between 3 and 30 characters.';
            return $data;
        }

        $user = $this->userModel->findByEmail($email);

        try {
            if($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $data['success'] = 'Login successfull!';
            } else {
                $data['error'] = 'Wrong credentials, try again.';
            }
        } catch (\Exception $e){
            $data['error'] = $e->getMessage();
        }
        return $data;
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }

}