<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//require_once '../vendor/autoload.php';
require_once '../config/conn.php';
//require_once '../app/Controllers/UserController.php';
require_once '../app/Controllers/PostController.php';
//require_once '../app/Controllers/CommentController.php';

use Controllers\PostController;

$controller = new PostController($pdo); // Ensure $pdo is defined correctly

$controller->index();

//$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//
//if ($uri === '') {
//    $controller = new PostController($pdo);
//    $controller->index();
//}