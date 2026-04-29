<!DOCTYPE html>
<?php
session_start();
require_once 'DB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["first_name"];
        $_SESSION["user_role"] = $user["role"];

        if ($user["role"] == "admin") {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>
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
    <link rel="stylesheet" href="./css/login.css">
    <title>Login | Games Review</title>
</head>

<body class="login-body">

    <div class="login-wrapper d-flex align-items-center justify-content-center min-vh-100">

        <div class="login-card">
            <!-- Top glow bar -->
            <div class="login-glow-bar"></div>

            <!-- Icon -->
            <div class="login-icon-box mx-auto mb-4">
                <i class="fa-solid fa-gamepad login-gamepad-icon"></i>
            </div>

            <!-- Title -->
            <h1 class="text-gradient login-title text-center mb-2">WELCOME BACK</h1>
            <p class="login-subtitle text-center mb-5">Sign in to continue your journey</p>

            <!-- Form -->
            <form action="login.php" method="POST">
                <!-- Email -->
                <div class="mb-4">
                    <label class="login-label mb-2">EMAIL</label>
                    <div class="login-input-group">
                        <i class="fa-regular fa-envelope login-input-icon"></i>
                        <input type="email" name="email" class="login-input" placeholder="you@example.com">
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label class="login-label mb-2">PASSWORD</label>
                    <div class="login-input-group">
                        <i class="fa-solid fa-lock login-input-icon"></i>
                        <input type="password" name="password" class="login-input" placeholder="········">
                    </div>
                </div>

                <!-- Error Message -->
                <?php if (isset($_GET["login_required"])): ?>
                    <div class="alert alert-info">Please login first to add games to your library.</div>
                <?php endif; ?>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <!-- Sign In Button -->
                <button type="submit" class="btn btn-gradient login-btn w-100 fw-bold mb-4">SIGN IN</button>
            </form>

            <!-- Sign up link -->
            <p class="text-center login-footer-text mb-3">
                Don't have an account? <a href="signup.php" class="login-signup-link">Sign up</a>
            </p>

            <!-- Back to home -->
            <p class="text-center">
                <a href="index.php" class="login-back-link">← Back to home</a>
            </p>
        </div>

    </div>

</body>

</html>
