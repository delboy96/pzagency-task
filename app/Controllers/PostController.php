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
        require '../app/Views/post/single.blade.php';
    }

    public function create($user_id, $title, $body)
    {
        $data = [];

        if (strlen($title) < 3 || strlen($title) > 40) {
            $data['error'] = 'Title must have between 3 and 30 characters.';
            return $data;
        }
        if (strlen($body) < 4 ) {
            $data['error'] = 'Body must have at least 4';
            return $data;
        }

        try {
            $postId = $this->postModel->create($user_id, $title, $body);
            $data['postId'] = $postId;
            $data['success'] = 'Post created successfully!';
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }

        return $data;
    }

    public function updateForm($id)
    {
        $blog = $this->postModel->find($id);
        require '../app/Views/post/update.blade.php';
    }

    public function update($id, $title, $body)
    {
        $data = [];

        if (strlen($title) < 3 || strlen($title) > 40) {
            $data['error'] = 'Title must have between 3 and 30 characters.';
            return $data;
        }
        if (strlen($body) < 4 ) {
            $data['error'] = 'Body must have at least 4';
            return $data;
        }

        try {
            $updated = $this->postModel->update($id, $title, $body);
            if($updated > 0) {
                $data['success'] = 'Post updated successfully!';
            }
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }

        return $data;
    }

    public function delete($id)
    {
        $data = [];

        try {
            $deleted = $this->postModel->delete($id);
            if($deleted > 0) {
                $data['success'] = 'Post deleted successfully!';
            }
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }

        return $data;
    }
}