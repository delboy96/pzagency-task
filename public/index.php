<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//require_once '../vendor/autoload.php';
require_once '../config/conn.php';
require_once '../app/Controllers/UserController.php';
require_once '../app/Controllers/PostController.php';
require_once '../app/Controllers/CommentController.php';
require_once '../app/Controllers/AuthController.php';

use Controllers\PostController;
use Controllers\AuthController;

$uri = $_SERVER['REQUEST_URI'];

// Remove query string and trim leading/trailing slashes
$uri = strtok($uri, '?');
$uri = trim($uri, '/');

// Remove base path from URI
$basePath = 'pzagencytask/public';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
    $uri = trim($uri, '/');
}

// Explode URI parts by slash
$uriParts = explode('/', $uri);

if ($uri === '' || $uri === 'index') {
    $controller = new PostController($pdo);
    $controller->index();
} elseif ($uriParts[0] === 'single' && isset($uriParts[1])) {
    $blogId = $uriParts[1];
    $controller = new PostController($pdo);
    $controller->show($blogId);
} elseif ($uriParts[0] === 'login') {
    $controller = new AuthController($pdo);
    $controller->login_page();
} elseif ($uriParts[0] === 'register') {
    $controller = new AuthController($pdo);
    $controller->register_page();
}
else {
    http_response_code(404);
    echo "404 Not Found";
}

//if ($uri === '/index') {
//    $controller = new PostController($pdo);
//    $controller->index();
//}