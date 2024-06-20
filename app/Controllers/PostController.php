<?php

namespace Controllers;

require_once __DIR__ . '/../Models/Post.php';

class PostController
{
    private $postModel;

    public function __construct($pdo)
    {
        $this->postModel = new \Models\Post($pdo);
    }

    public function index()
    {
        $blogs = $this->postModel->getAll();
        require '../app/Views/index.blade.php';
    }
}