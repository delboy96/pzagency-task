<?php

require 'config/conn.php';

try {
    $sql = file_get_contents('database/migrations/2024_01_01_000000_create_tables.sql');
    $pdo->exec($sql);
    echo "Database tables created successfully.";
} catch (PDOException $e) {
    echo "Error creating database tables: " . $e->getMessage();
}
