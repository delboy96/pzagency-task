<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/PostController.php';

use Controllers\PostController;

$postController = new PostController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_method']) && $_POST['_method'] == 'PATCH') {
    $data = $postController->update($_POST['post_id'], $_POST['title'], $_POST['body']);
    echo isset($data['success']) ? $data['success'] : $data['error'];
    session_start();
    $_SESSION['message'] = $data['success'];
    header('Location:'.BASE_URL.'single/'.$_POST['post_id']);
} else {
    require 'app/Views/auth/register.blade.php';
}