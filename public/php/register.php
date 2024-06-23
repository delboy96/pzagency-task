<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/AuthController.php';

use Controllers\AuthController;

$authController = new AuthController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $authController->register($_POST['email'], $_POST['name'], $_POST['password']);
    session_start();
    if(!empty($data['success'])){
        $_SESSION['success'] = $data['success'];
        header('Location:'.BASE_URL.'login');
    } else {
        $_SESSION['error'] = $data['error'];
        header('Location:'.BASE_URL.'register');
    }
} else {
    require 'app/Views/auth/register.blade.php';
}