<?php
session_start();
http_response_code(404);
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
    <link rel="stylesheet" href="./css/404.css">
    <title>404 | Games Review</title>
</head>

<body>
    <main class="error-page min-vh-100 d-flex align-items-center">
        <div class="container text-center">
            <i class="fa-solid fa-triangle-exclamation error-icon mb-4"></i>
            <p class="error-code text-gradient mb-2">404</p>
            <h1 class="error-title text-white mb-3">Something went wrong</h1>
            <p class="error-text text-white-50 mb-4">
                The page you are looking for is not available.
            </p>
            <a href="index.php" class="btn btn-gradient px-4 py-2 fw-bold">
                BACK HOME
            </a>
        </div>
    </main>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>
