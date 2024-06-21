<?php

require '../../config/conn.php';
require_once '../../app/Controllers/AuthController.php';

use Controllers\AuthController;

$authController = new AuthController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $authController->register($_POST['email'], $_POST['name'], $_POST['password']);
    echo isset($data['success']) ? $data['success'] : $data['error'];
} else {
    require 'app/Views/auth/register.blade.php';
}