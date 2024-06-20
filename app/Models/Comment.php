<?php

namespace Models;
class Comment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM comments');
        return $stmt->fetchAll();
    }

    public function getBlogComments($blogId)
    {
        $stmt = $this->pdo->prepare('SELECT comments.*, users.name as user_name FROM comments INNER JOIN users ON comments.user_id = users.id WHERE post_id = ?');
        $stmt->execute([$blogId]);
        return $stmt->fetchAll();
    }
}