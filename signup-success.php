<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your Games Review account was created successfully.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/successful.css">
    <title>Successful Sign Up | Games Review</title>
</head>

<body>
    <main class="error-page success-page min-vh-100 d-flex align-items-center">
        <div class="container text-center">
            <i class="fa-solid fa-circle-check error-icon success-icon mb-4"></i>
            <p class="error-code text-gradient mb-2">DONE</p>
            <h1 class="error-title text-white mb-3">Successful sign up</h1>
            <p class="error-text text-white-50 mb-4">
                Your account has been created successfully.
            </p>
            <div class="status-actions d-flex justify-content-center gap-3 flex-wrap">
                <a href="index.php" class="btn btn-gradient px-4 py-2 fw-bold">
                    BACK HOME
                </a>
                <a href="login.php" class="btn btn-outline-cyan px-4 py-2 fw-bold">
                    GO TO SIGN IN
                </a>
            </div>
        </div>
    </main>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>
