<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/AuthController.php';

use Controllers\AuthController;

$authController = new AuthController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $authController->login($_POST['email'], $_POST['password']);
    if(!empty($data['success'])){
        $_SESSION['success'] = $data['success'];
        header('Location:'.BASE_URL);
    } else {
        session_start();
        $_SESSION['error'] = $data['error'];
        header('Location:'.BASE_URL.'login');
    }
} else {
    require 'app/Views/auth/login.blade.php';
}