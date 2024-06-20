<?php

namespace seeders;

require 'config/conn.php';

class UserSeeder {
    public function run() {
        global $pdo;

        $pdo->exec("DELETE FROM users");

        $users = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => password_hash('secret', PASSWORD_BCRYPT)],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => password_hash('secret', PASSWORD_BCRYPT)],
        ];

        foreach ($users as $user) {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $stmt->execute($user);
        }

        echo "UserSeeder ran successfully.\n";
    }
}

$seeder = new UserSeeder();
$seeder->run();