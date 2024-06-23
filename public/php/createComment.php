<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/CommentController.php';

use Controllers\CommentController;

$commentController = new CommentController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $commentController->create($_POST['post_id'], $_POST['user_id'], $_POST['comment']);
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