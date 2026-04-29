<!DOCTYPE html>

<?php
session_start();
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
    <link rel="stylesheet" href="./css/home.css">
    <title>Home | Games Review</title>
</head>

<body>

    <!-- navBar -->
    <nav class="navbar navbar-expand-lg p-4 z-3 position-sticky site-navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand text-white d-flex align-items-center gap-2" href="index.php">
                <i class="fa-solid fa-gamepad fs-3 text-purple"></i>
                <span class="text-gradient m-0 fs-4">GAMES REVIEW</span>
            </a>

            <button class="navbar-toggler navbar-dark border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-4">
                    <li class="nav-item">
                        <a class="nav-link nav-active-link" href="index.php">HOME</a>
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
                        <a class="nav-link text-white" href="profile.php">PROFILE</a>
                    </li>
                </ul>
                <div class="d-flex">
    <?php if (isset($_SESSION["user_name"])): ?>
        <span class="text-white me-3 align-self-center">
            👋 <?= $_SESSION["user_name"] ?>
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

    <!-- main section -->
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-overlay"></div>
            <div class="container hero-content">
                <p class="text-info hero-tag mb-3">LEVEL UP YOUR GAME LIBRARY</p>
                <h1 class="hero-title text-white mb-4">
                    HONEST REVIEWS<br>
                    <span class="text-gradient">EPIC GAMES</span>
                </h1>
                <p class="hero-desc text-white-50 mb-5">
                    Deep-dive reviews, ratings, and breakdowns of the latest releases across PC,
                    console, and mobile. No hype – just honest takes.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="games.php" class="btn btn-gradient px-5 py-3 rounded-2 fw-bold">
                        BROWSE REVIEWS <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a href="about.php" class="btn btn-about px-5 py-3">ABOUT US</a>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <div class="stat-card card text-center py-5 h-100">
                            <div class="card-body">
                                <div class="stat-icon-circle">
                                    <i class="fa-solid fa-trophy"></i>
                                </div>
                                <h2 class="display-5 fw-bold text-gradient mb-2">2,400+</h2>
                                <p class="stat-label m-0">Reviews Published</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card card text-center py-5 h-100">
                            <div class="card-body">
                                <div class="stat-icon-circle">
                                    <i class="fa-solid fa-bolt"></i>
                                </div>
                                <h2 class="display-5 fw-bold text-gradient mb-2">1,800+</h2>
                                <p class="stat-label m-0">Games Tested</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card card text-center py-5 h-100">
                            <div class="card-body">
                                <div class="stat-icon-circle">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <h2 class="display-5 fw-bold text-gradient mb-2">500K</h2>
                                <p class="stat-label m-0">Monthly Readers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="newsletter-section">
            <div class="container">
                <div class="newsletter-card p-5 text-center">
                    <div class="newsletter-glow"></div>
                    <div class="card-body position-relative z-1 py-5">
                        <h2 class="display-4 fw-black text-white mb-3">
                            Never Miss A <span class="text-gradient">Drop</span>
                        </h2>
                        <p class="text-white-50 mb-5 fs-5">
                            Get fresh reviews, release dates, and gaming news straight to your inbox every week.
                        </p>
                        <a href="#" class="btn btn-gradient px-5 py-3 rounded-2 fw-bold">SUBSCRIBE NOW</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
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

    <!-- loader -->
    <section id="loader"
        class="vh-100 w-100 justify-content-center align-items-center position-fixed end-0 start-0 bottom-0 top-0">
        <!-- From Uiverse.io by alexruix --> 

  <div class="loader">
    <span class="loader-text">loading</span>
      <span class="load"></span>
  </div>

    </section>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/Jquery.js"></script>
    <script src="./js/index.js" type="module"></script>
</body>

</html>
