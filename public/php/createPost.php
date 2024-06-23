<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/PostController.php';

use Controllers\PostController;

$postController = new PostController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $postController->create($_POST['user_id'], $_POST['title'], $_POST['body']);
    session_start();
    if(!empty($data['success'])){
        $_SESSION['success'] = $data['success'];
        header('Location:'.BASE_URL.'single/'.$data['postId']);
    } else {
        $_SESSION['error'] = $data['error'];
        header('Location:'.BASE_URL);
    }
} else {
    require 'public/index.php';
}