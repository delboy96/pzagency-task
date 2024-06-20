<?php

namespace seeders;

require 'config/conn.php';

class CommentSeeder {
    public function run() {
        global $pdo;

        $pdo->exec("DELETE FROM comments");


        $comments = [
            ['post_id' => 1, 'user_id' => 2, 'comment' => 'Great post!'],
            ['post_id' => 2, 'user_id' => 1, 'comment' => 'Thanks for sharing.'],
        ];

        foreach ($comments as $comment) {
            $stmt = $pdo->prepare("INSERT INTO comments (post_id, user_id, comment) VALUES (:post_id, :user_id, :comment)");
            $stmt->execute($comment);
        }

        echo "CommentSeeder ran successfully.\n";
    }
}

$seeder = new CommentSeeder();
$seeder->run();