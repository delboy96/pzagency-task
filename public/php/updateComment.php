<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/CommentController.php';

use Controllers\CommentController;

$commentController = new CommentController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_method']) && $_POST['_method'] == 'PATCH') {
    $data = $commentController->update($_POST['comment_id'], $_POST['comment']);
    session_start();
    if(!empty($data['success'])){
        $_SESSION['success'] = $data['success'];
    } else {
        $_SESSION['error'] = $data['error'];
    }
    header('Location:'.BASE_URL.'single/'.$_POST['post_id']);
} else {
    require 'public/index.php';
}