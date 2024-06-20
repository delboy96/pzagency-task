<?php

namespace Controllers;

require_once __DIR__ . '/../Models/Post.php';
require_once __DIR__ . '/../Models/Comment.php';

class PostController
{
    private $postModel;
    private $commentModel;

    public function __construct($pdo)
    {
        $this->postModel = new \Models\Post($pdo);
        $this->commentModel = new \Models\Comment($pdo);
    }

    public function index()
    {
        $blogs = $this->postModel->getAll();
        require '../app/Views/index.blade.php';
    }

    public function show($id)
    {
        $blog = $this->postModel->find($id);
        $comments = $this->commentModel->getBlogComments($id);
        require '../app/Views/single.blade.php';
    }
}