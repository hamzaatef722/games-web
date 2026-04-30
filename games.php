<?php
session_start();
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
    <link rel="stylesheet" href="./css/games.css">
    <title>Games</title>
</head>

<body>

    <!-- navBar -->
    <nav class="navbar navbar-expand-lg p-4 z-3 position-relative games-navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand text-white d-flex align-items-center gap-2" href="index.php">
                <i class="fa-solid fa-gamepad fs-3 games-brand-icon"></i>
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
                        <a class="nav-link text-white" href="./index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link games-active-link" href="games.php">GAMES</a>
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
    <!-- games section -->
    <main>
        <!-- Explore Hero -->
        <section class="py-5 text-center games-hero-section">
            <div class="container py-5">
                <span
                    class="badge rounded-pill border border-secondary text-white-50 px-3 py-2 mb-4 d-inline-flex align-items-center gap-2 games-discover-badge"><i class="fa-solid fa-gamepad"></i> DISCOVER</span>
                <h1 class="display-3 fw-black mb-3 text-white games-hero-title"><span
                        class="text-gradient">EXPLORE</span> GAMES</h1>
                <p class="text-white-50 mb-5 fs-5">Pick a genre and discover top-rated games from across the universe.
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a class="category-pill nav-category active" category-id="mmorpg" href="#">mmorpg</a>
                    <a class="category-pill nav-category" category-id="shooter" href="#">shooter</a>
                    <a class="category-pill nav-category" category-id="sailing" href="#">sailing</a>
                    <a class="category-pill nav-category" category-id="permadeath" href="#">permadeath</a>
                    <a class="category-pill nav-category" category-id="superhero" href="#">superhero</a>
                    <a class="category-pill nav-category" category-id="pixel" href="#">pixel</a>
                </div>
            </div>
        </section>

        <section id="games" class="py-5 games-list-section">
            <div class="container">
                <div id="games-display" class="row gy-4">
                    <!-- <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                        <div class="card games-demo-card">
                            <img src="./img/thumbnail.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">name</span>
                                    <span class="badge bg-info text-white">free</span>
                                </div>
                                <p class="card-text text-center">Some quick example text to build on the .</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>Category</div>
                                <div>Device</div>
                            </div>
                        </div>

                    </div> -->
                    <!-- <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                        <div class="card games-demo-card">
                            <img src="./img/thumbnail.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">name</span>
                                    <span class="badge bg-info text-white">free</span>
                                </div>
                                <p class="card-text text-center">Some quick example text to build on the .</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>Category</div>
                                <div>Device</div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                        <div class="card d-flex flex-column games-demo-card">
                            <img src="./img/thumbnail.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">name</span>
                                    <span class="badge bg-info text-white">free</span>
                                </div>
                                <p class="card-text text-center">ld on the .</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>Category</div>
                                <div>Device</div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                        <div class="card games-demo-card">
                            <img src="./img/thumbnail.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">name</span>
                                    <span class="badge bg-info text-white">free</span>
                                </div>
                                <p class="card-text text-center">Some quick example text to build on the .</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>Category</div>
                                <div>Device</div>
                            </div>
                        </div>

                    </div> -->
                </div>
            </div>
        </section>
    </main>
    <!-- details section -->
    <section id="details" class="d-none py-4">
        <div class="container">
            <header class="d-flex justify-content-between">
                <h2>Details Game</h2>
                <span id="close-btn" role="button">
                    <i class="fa fa-close fa-2x"></i>
                </span>
            </header>
            <div id="details-display" class="row g-4">
                <!-- <div class="col-md-4">
                    <img src="./img/thumbnail.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-md-8">
                    <h3>Title: Tarisland</h3>
                    <p>
                        <span>Category: </span>
                        <span class="details-info text-center text-bg-info"> MMORPG</span>
                    </p>
                    <p>
                        <span>Platform: </span>
                        <span class="details-info text-center text-bg-info"> Windows</span>
                    </p>
                    <p>
                        <span>Status: </span>
                        <span class="details-info text-center text-bg-info"> Live</span>
                    </p>
                    <p class="small">Tarisland is a free-to-play cross-platform MMORPG developed by Level Infinite and Published by
                        Tencent.

                        Available on PC and mobile devices, the game allows players to easily move between both, taking
                        the game with them when they can’t be at their desk. The game is designed to appeal to players
                        of MMOs like World of Warcraft, offering players nine playable classes and 18 specializations.

                        Each class features an extensive talent tree system and can be customized. Players of existing
                        MMOs will be familiar with the standard tank, DPS, and healer lineup, necessary for the game’s
                        classic raid and dungeon system. Explore a vast game world and solve mysteries. Pick up various
                        trades such as gathering, mining, and crafting, and sell your items on the auction house.</p>
                        <a class="btn btn-outline-warning text-white" target="_blank" href="">Show Game</a>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="py-4 mt-auto games-footer">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <a class="navbar-brand text-white d-flex align-items-center gap-2 mb-3 mb-md-0" href="index.php">
                <i class="fa-solid fa-gamepad fs-4 games-brand-icon"></i>
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
