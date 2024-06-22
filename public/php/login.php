<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/AuthController.php';

use Controllers\AuthController;

$authController = new AuthController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $authController->login($_POST['email'], $_POST['password']);
    echo isset($data['success']) ? $data['success'] : $data['error'];
    $_SESSION['message'] = $data['success'];
    header('Location:'.BASE_URL);
} else {
    require 'app/Views/auth/login.blade.php';
}