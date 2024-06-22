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

    public function create($user_id, $title, $body)
    {
        $stmt = $this->pdo->prepare('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)');
        $created = $stmt->execute([$user_id, $title, $body]);

        if($created) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function update($id, $title, $body)
    {
        $stmt = $this->pdo->prepare('UPDATE posts SET title = ?, body = ? WHERE id = ?');
        $stmt->execute([$title, $body, $id]);

        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM posts WHERE id = ?');
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}