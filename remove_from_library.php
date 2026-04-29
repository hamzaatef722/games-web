<?php
session_start();
require_once 'DB.php';

function json_response($data, $statusCode = 200)
{
    http_response_code($statusCode);
    header("Content-Type: application/json");
    echo json_encode($data);
    exit();
}

if (!isset($_SESSION["user_id"])) {
    json_response([
        "success" => false,
        "login_required" => true,
        "login_url" => "login.php?login_required=1"
    ], 401);
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    json_response([
        "success" => false,
        "message" => "Invalid request."
    ], 405);
}

$game_id = filter_input(INPUT_POST, "game_id", FILTER_VALIDATE_INT);

if (!$game_id) {
    json_response([
        "success" => false,
        "message" => "Invalid game id."
    ], 400);
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

$stmt = $conn->prepare("DELETE FROM user_game_library WHERE user_id = ? AND game_id = ?");
$stmt->execute([$_SESSION["user_id"], $game_id]);

json_response([
    "success" => true,
    "game_id" => $game_id
]);
