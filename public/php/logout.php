<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/AuthController.php';

use Controllers\AuthController;

$authController = new AuthController($pdo);
$authController->logout();
header('Location:'.BASE_URL);
exit;