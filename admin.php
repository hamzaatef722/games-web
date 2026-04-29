<?php
session_start();
require_once 'DB.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if (($_SESSION["user_role"] ?? "") !== "admin") {
    header("Location: profile.php");
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

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_user_id"])) {
    $deleteUserId = trim($_POST["delete_user_id"]);

    if ($deleteUserId === $_SESSION["user_id"]) {
        $message = "You cannot delete your own admin account.";
    } else {
        $roleStmt = $conn->prepare("SELECT role FROM users WHERE id = ?");
        $roleStmt->execute([$deleteUserId]);
        $deleteUserRole = $roleStmt->fetchColumn();

        if ($deleteUserRole === "admin") {
            $message = "Admin accounts cannot be deleted from here.";
        } elseif ($deleteUserRole) {
            $libraryStmt = $conn->prepare("DELETE FROM user_game_library WHERE user_id = ?");
            $libraryStmt->execute([$deleteUserId]);

            $deleteStmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $deleteStmt->execute([$deleteUserId]);

            $message = "User deleted successfully.";
        }
    }
}

$countStmt = $conn->query("SELECT COUNT(*) FROM users WHERE role <> 'admin'");
$usersCount = (int) $countStmt->fetchColumn();

$usersStmt = $conn->query("
    SELECT id, first_name, last_name, email, role
    FROM users
    WHERE role <> 'admin'
    ORDER BY first_name ASC, last_name ASC
");
$users = $usersStmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="./css/admin.css">
    <title>Admin | Games Review</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-4 z-3 position-relative profile-navbar">
        <div class="container">
            <a class="navbar-brand text-white d-flex align-items-center gap-2" href="#">
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
                    <!-- <li class="nav-item"><a class="nav-link text-white" href="index.php">HOME</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="games.php">GAMES</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="about.php">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="contact.php">CONTACT</a></li> -->
                    <li class="nav-item"><a class="nav-link profile-active-link" href="admin.php">ADMIN</a></li>
                </ul>
                <div class="d-flex">
                    <span class="text-white me-3 align-self-center">
                        <?= htmlspecialchars($_SESSION["user_name"]) ?>
                    </span>
                    <a href="logout.php" class="btn btn-outline-danger px-4 py-2 rounded-3 fw-bold">LOGOUT</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="profile-page">
        <section class="profile-hero py-5">
            <div class="container py-4">
                <?php if ($message !== ""): ?>
                    <div class="alert profile-alert mb-4">
                        <?= htmlspecialchars($message) ?>
                    </div>
                <?php endif; ?>

                <div class="profile-panel">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-7">
                            <div class="d-flex align-items-center gap-4 flex-wrap">
                                <div class="profile-avatar">
                                    <i class="fa-solid fa-user-shield"></i>
                                </div>
                                <div>
                                    <p class="profile-eyebrow mb-2">ADMIN DASHBOARD</p>
                                    <h1 class="profile-title text-white mb-3">Users Control</h1>
                                    <p class="profile-email mb-0">Manage registered users on Games Review.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="profile-stats">
                                <div>
                                    <span class="profile-stat-number"><?= $usersCount ?></span>
                                    <span class="profile-stat-label">Users In Website</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="admin-users-section py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <div>
                        <p class="profile-eyebrow mb-2">REGISTERED USERS</p>
                        <h2 class="library-title text-white mb-0">Users List</h2>
                    </div>
                </div>

                <?php if (count($users) === 0): ?>
                    <div class="empty-library text-center py-5">
                        <div class="empty-icon mx-auto mb-4">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <h3 class="text-white mb-3">No users yet</h3>
                        <p class="text-white-50 mb-0">New accounts will appear here.</p>
                    </div>
                <?php else: ?>
                    <div class="admin-users-panel">
                        <?php foreach ($users as $user): ?>
                            <?php $fullName = trim($user["first_name"] . " " . $user["last_name"]); ?>
                            <div class="admin-user-row">
                                <div class="admin-user-main">
                                    <div class="admin-user-avatar">
                                        <?= htmlspecialchars(strtoupper(substr($user["first_name"], 0, 1))) ?>
                                    </div>
                                    <div>
                                        <h3 class="admin-user-name mb-1"><?= htmlspecialchars($fullName) ?></h3>
                                        <p class="admin-user-email mb-0"><?= htmlspecialchars($user["email"]) ?></p>
                                    </div>
                                </div>

                                <form method="POST" onsubmit="return confirm('Delete this user?');">
                                    <input type="hidden" name="delete_user_id" value="<?= htmlspecialchars($user["id"]) ?>">
                                    <button type="submit" class="admin-delete-btn" title="Delete user">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
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
</body>

</html>
