<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/PostController.php';

use Controllers\PostController;

$postController = new PostController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_method']) && $_POST['_method'] == 'PATCH') {
    $data = $postController->update($_POST['post_id'], $_POST['title'], $_POST['body']);
    session_start();
    if(!empty($data['success'])){
        $_SESSION['success'] = $data['success'];
        header('Location:'.BASE_URL.'single/'.$_POST['post_id']);
    } else {
        $_SESSION['error'] = $data['error'];
        header('Location:'.BASE_URL.'single/'.$_POST['post_id']);
    }
} else {
    require 'public/index.php';
}