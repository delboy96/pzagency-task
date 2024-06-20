<?php

namespace seeders;

require 'database/seeders/UserSeeder.php';
require 'database/seeders/PostSeeder.php';
require 'database/seeders/CommentSeeder.php';
class DatabaseSeeder {
    public function run() {
        global $pdo;

        try {
            $pdo->beginTransaction();

            $this->call(UserSeeder::class);
            $this->call(PostSeeder::class);
            $this->call(CommentSeeder::class);

            $pdo->commit();
            echo "Database seeding completed successfully.\n";
        } catch (Exception $e) {
            $pdo->rollBack();
            echo "Database seeding failed: " . $e->getMessage() . "\n";
        }
    }

    public function call($seeder) {
        $seederInstance = new $seeder();
        $seederInstance->run();
    }
}

$seeder = new DatabaseSeeder();
$seeder->run();