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

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT comments.*, users.name as user_name FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($post_id, $user_id, $comment)
    {
        $stmt = $this->pdo->prepare('INSERT INTO comments (post_id, user_id, comment) VALUES (?, ?, ?)');
        $created = $stmt->execute([$post_id, $user_id, $comment]);

        if($created) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function update($id, $comment)
    {
        $stmt = $this->pdo->prepare('UPDATE comments SET comment = ? WHERE id = ?');
        $stmt->execute([$comment, $id]);

        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM comments WHERE id = ?');
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}