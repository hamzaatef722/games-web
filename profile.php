<?php
session_start();
require_once 'DB.php';

$isLoggedIn = isset($_SESSION["user_id"]);
$libraryGames = [];
$libraryGameIds = [];

if ($isLoggedIn) {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS user_game_library (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id VARCHAR(64) NOT NULL,
            game_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            UNIQUE KEY unique_user_game (user_id, game_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");

    try {
        $oldTable = $conn->query("SHOW TABLES LIKE 'user_library'")->fetchColumn();
        if ($oldTable) {
            $conn->exec("
                INSERT IGNORE INTO user_game_library (user_id, game_id)
                SELECT user_id, game_id FROM user_library
            ");
        }
    } catch (PDOException $e) {
        // Old library table shapes should not block the new ID-only library.
    }

    $stmt = $conn->prepare("SELECT first_name, last_name, email FROM users WHERE id = ?");
    $stmt->execute([$_SESSION["user_id"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        session_destroy();
        $isLoggedIn = false;
    } else {
        $libraryStmt = $conn->prepare("SELECT game_id FROM user_game_library WHERE user_id = ? ORDER BY created_at DESC");
        $libraryStmt->execute([$_SESSION["user_id"]]);
        $libraryGames = $libraryStmt->fetchAll(PDO::FETCH_ASSOC);
        $libraryGameIds = array_map("intval", array_column($libraryGames, "game_id"));

        $fullName = trim($user["first_name"] . " " . $user["last_name"]);
        $initial = strtoupper(substr($user["first_name"], 0, 1));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/profile.css">
    <title>Profile | Games Review</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-4 z-3 position-relative profile-navbar">
        <div class="container">
            <a class="navbar-brand text-white d-flex align-items-center gap-2" href="index.php">
                <i class="fa-solid fa-gamepad fs-3 text-purple"></i>
                <span class="text-gradient m-0 fs-4">GAMES REVIEW</span>
            </a>

            <button class="navbar-toggler navbar-dark border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="games.php">GAMES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profile-active-link" href="profile.php">PROFILE</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php if ($isLoggedIn): ?>
                        <span class="text-white me-3 align-self-center">
                            <?= htmlspecialchars($_SESSION["user_name"]) ?>
                        </span>
                        <a href="logout.php" class="btn btn-outline-danger px-4 py-2 rounded-3 fw-bold">
                            LOGOUT
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-gradient px-4 py-2 rounded-3 fw-bold">
                            <i class="fa-regular fa-user me-2"></i> LOGIN
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="profile-page">
        <?php if (!$isLoggedIn): ?>
            <section class="profile-guest-section d-flex align-items-center">
                <div class="container">
                    <div class="profile-guest-card text-center mx-auto">
                        <div class="empty-icon mx-auto mb-4">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <p class="profile-eyebrow mb-2">LOGIN REQUIRED</p>
                        <h1 class="profile-title text-white mb-3">Profile Locked</h1>
                        <p class="text-white-50 mb-4">
                            Please sign in first to view your profile and game library.
                        </p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a href="login.php" class="btn btn-gradient px-5 py-3 fw-bold">
                                <i class="fa-regular fa-user me-2"></i> LOGIN
                            </a>
                            <a href="games.php" class="btn btn-outline-info px-5 py-3 fw-bold">
                                BROWSE GAMES
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
        <section class="profile-hero py-5">
            <div class="container py-4">
                <?php if (isset($_GET["added"])): ?>
                    <div class="alert profile-alert mb-4">
                        Game added to your library.
                    </div>
                <?php endif; ?>

                <div class="profile-panel">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-7">
                            <div class="d-flex align-items-center gap-4 flex-wrap">
                                <div class="profile-avatar">
                                    <?= htmlspecialchars($initial) ?>
                                </div>
                                <div>
                                    <p class="profile-eyebrow mb-2">PLAYER PROFILE</p>
                                    <h1 class="profile-title text-white mb-3">
                                        <?= htmlspecialchars($fullName) ?>
                                    </h1>
                                    <p class="profile-email mb-0">
                                        <i class="fa-regular fa-envelope me-2"></i>
                                        <?= htmlspecialchars($user["email"]) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="profile-stats">
                                <div>
                                    <span id="library-count" class="profile-stat-number"><?= count($libraryGames) ?></span>
                                    <span class="profile-stat-label">Games In Library</span>
                                </div>
                                <a href="games.php" class="btn btn-gradient px-4 py-3 fw-bold">
                                    <i class="fa-solid fa-plus me-2"></i> ADD GAMES
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="library-section py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <div>
                        <p class="profile-eyebrow mb-2">MY COLLECTION</p>
                        <h2 class="library-title text-white mb-0">Game Library</h2>
                    </div>
                </div>

                <?php if (count($libraryGames) === 0): ?>
                    <div class="empty-library text-center py-5">
                        <div class="empty-icon mx-auto mb-4">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <h3 class="text-white mb-3">Your library is empty</h3>
                        <p class="text-white-50 mb-4">Start adding games from the games page and they will show up here.</p>
                        <a href="games.php" class="btn btn-gradient px-5 py-3 fw-bold">BROWSE GAMES</a>
                    </div>
                <?php else: ?>
                    <div id="profile-library-display" class="row g-4">
                        <div class="col-12">
                            <div class="library-loading text-center py-5">
                                Loading your saved games...
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
    </main>

    <footer class="py-4 mt-auto profile-footer">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <a class="navbar-brand text-white d-flex align-items-center gap-2 mb-3 mb-md-0" href="index.php">
                <i class="fa-solid fa-gamepad fs-4 text-purple"></i>
                <span class="text-gradient footer-logo-text m-0 fs-5">GAMES REVIEW</span>
            </a>
            <p class="text-white-50 small m-0 mb-3 mb-md-0">&copy; 2026 Games Review. All rights reserved.</p>
            <div class="footer-social d-flex">
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-twitch"></i>
            </div>
        </div>
    </footer>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <?php if ($isLoggedIn): ?>
        <script>
            window.libraryGameIds = <?= json_encode($libraryGameIds) ?>;
        </script>
        <script src="./js/profile.js" type="module"></script>
    <?php endif; ?>
</body>

</html>
