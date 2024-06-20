<?php

namespace Models;
class Post
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM posts');
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT posts.*, users.name as user_name FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}