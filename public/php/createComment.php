<?php

require '../../config/conn.php';
require '../../config/config.php';
require_once '../../app/Controllers/CommentController.php';

use Controllers\CommentController;

$commentController = new CommentController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $commentController->create($_POST['post_id'], $_POST['user_id'], $_POST['comment']);
    echo isset($data['success']) ? $data['success'] : $data['error'];
    session_start();
    $_SESSION['message'] = $data['success'];
    header('Location:'.BASE_URL.'single/'.$_POST['post_id']);
} else {
    require 'public/index.php';
}