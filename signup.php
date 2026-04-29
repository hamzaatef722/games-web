<?php
session_start();
require_once 'DB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST["first_name"]);
    $last_name  = trim($_POST["last_name"]);
    $email      = trim($_POST["email"]);
    $password   = trim($_POST["password"]);
    $confirm    = trim($_POST["confirm"]);

    if ($password !== $confirm) {
        $error = "Passwords do not match!";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = "Email already exists!";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (id, first_name, last_name, email, password, role) VALUES (UUID(), ?, ?, ?, ?, 'user')");
            $stmt->execute([$first_name, $last_name, $email, $hashed]);
            header("Location: login.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create your Games Review account and start exploring the best game reviews.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/signup.css">
    <title>Sign Up | Games Review</title>
</head>

<body class="login-body">

    <div class="login-wrapper d-flex align-items-center justify-content-center min-vh-100">

        <div class="login-card signup-card">
            <!-- Top glow bar -->
            <div class="login-glow-bar signup-glow-bar"></div>

            <!-- Icon -->
            <div class="login-icon-box mx-auto mb-4">
                <i class="fa-solid fa-user-plus login-gamepad-icon"></i>
            </div>

            <!-- Title -->
            <h1 class="text-gradient login-title text-center mb-2">CREATE ACCOUNT</h1>
            <p class="login-subtitle text-center mb-4">Join the ultimate gaming community</p>

            <!-- Form -->
            <form action="signup.php" method="POST">

                <!-- First Name & Last Name row -->
                <div class="signup-name-row mb-4">
                    <!-- First Name -->
                    <div class="signup-name-field">
                        <label class="login-label mb-2" for="signup-firstname">FIRST NAME</label>
                        <div class="login-input-group">
                            <i class="fa-solid fa-user login-input-icon"></i>
                            <input id="signup-firstname" name="first_name" type="text" class="login-input" placeholder="John">
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div class="signup-name-field">
                        <label class="login-label mb-2" for="signup-lastname">LAST NAME</label>
                        <div class="login-input-group">
                            <i class="fa-solid fa-user login-input-icon"></i>
                            <input id="signup-lastname" name="last_name" type="text" class="login-input" placeholder="Doe">
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="login-label mb-2" for="signup-email">EMAIL</label>
                    <div class="login-input-group">
                        <i class="fa-regular fa-envelope login-input-icon"></i>
                        <input id="signup-email" name="email" type="email" class="login-input" placeholder="you@example.com">
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="login-label mb-2" for="signup-password">PASSWORD</label>
                    <div class="login-input-group">
                        <i class="fa-solid fa-lock login-input-icon"></i>
                        <input id="signup-password" name="password" type="password" class="login-input" placeholder="········">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label class="login-label mb-2" for="signup-confirm">CONFIRM PASSWORD</label>
                    <div class="login-input-group">
                        <i class="fa-solid fa-shield-halved login-input-icon"></i>
                        <input id="signup-confirm" name="confirm" type="password" class="login-input" placeholder="········">
                    </div>
                </div>

                <!-- Error Message -->
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger mb-4"><?= $error ?></div>
                <?php endif; ?>

                <!-- Sign Up Button -->
                <button type="submit" class="btn btn-gradient login-btn w-100 fw-bold mb-4">CREATE ACCOUNT</button>
            </form>

            <!-- Login link -->
            <p class="text-center login-footer-text mb-3">
                Already have an account? <a href="login.php" class="login-signup-link">Sign in</a>
            </p>

            <!-- Back to home -->
            <p class="text-center">
                <a href="index.php" class="login-back-link">← Back to home</a>
            </p>
        </div>

    </div>

</body>

</html>