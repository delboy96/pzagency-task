<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/PostController.php';

use Controllers\PostController;

$postController = new PostController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_method']) && $_POST['_method'] == 'DELETE') {
    $data = $postController->delete($_POST['post_id']);
    session_start();
    if(!empty($data['success'])){
        $_SESSION['success'] = $data['success'];
        header('Location:'.BASE_URL);
    } else {
        $_SESSION['error'] = $data['error'];
        header('Location:'.BASE_URL.'single/'.$_POST['post_id']);
    }
} else {
    require 'public/index.php';
}