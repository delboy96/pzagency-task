<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/AuthController.php';

use Controllers\AuthController;

$authController = new AuthController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $authController->register($_POST['email'], $_POST['name'], $_POST['password']);
    echo isset($data['success']) ? $data['success'] : $data['error'];
    session_start();
    $_SESSION['message'] = $data['success'];
    header('Location:'.BASE_URL.'login');
} else {
    require 'app/Views/auth/register.blade.php';
}