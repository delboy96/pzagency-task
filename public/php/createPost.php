<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/PostController.php';

use Controllers\PostController;

$postController = new PostController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $postController->create($_POST['user_id'], $_POST['title'], $_POST['body']);
    echo isset($data['success']) ? $data['success'] : $data['error'];
    session_start();
    $_SESSION['message'] = $data['success'];
    header('Location:'.BASE_URL.'single/'.$data['postId']);
} else {
    require 'public/index.php';
}