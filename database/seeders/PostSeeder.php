<?php

namespace seeders;

require 'config/conn.php';

class PostSeeder {
    public function run() {
        global $pdo;

        $pdo->exec("DELETE FROM posts");


        $posts = [
            ['user_id' => 1, 'title' => 'First Post', 'body' => 'This is the body of the first post.'],
            ['user_id' => 2, 'title' => 'Second Post', 'body' => 'This is the body of the second post.'],
        ];

        foreach ($posts as $post) {
            $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)");
            $stmt->execute($post);
        }

        echo "PostSeeder ran successfully.\n";
    }
}

$seeder = new PostSeeder();
$seeder->run();