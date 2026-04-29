<?php
session_start();
require_once 'DB.php';

header("Content-Type: application/json");

$game_id = filter_input(INPUT_GET, "game_id", FILTER_VALIDATE_INT);

if (!$game_id) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid game id."
    ]);
    exit();
}

if (!isset($_SESSION["user_id"])) {
    echo json_encode([
        "success" => true,
        "logged_in" => false,
        "added" => false
    ]);
    exit();
}

$conn->exec("
    CREATE TABLE IF NOT EXISTS user_game_library (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id VARCHAR(64) NOT NULL,
        game_id INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE KEY unique_user_game (user_id, game_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

$stmt = $conn->prepare("SELECT id FROM user_game_library WHERE user_id = ? AND game_id = ? LIMIT 1");
$stmt->execute([$_SESSION["user_id"], $game_id]);

echo json_encode([
    "success" => true,
    "logged_in" => true,
    "added" => (bool) $stmt->fetchColumn()
]);
