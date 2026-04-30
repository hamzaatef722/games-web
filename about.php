<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Learn about Games Review – a crew of passionate gamers turning thousands of hours of play into reviews you can actually trust.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/about.css">
    <title>About – Games Review</title>
</head>

<body>

    <!-- navBar -->
    <nav class="navbar navbar-expand-lg p-4 z-3 position-relative about-navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand text-white d-flex align-items-center gap-2" href="index.php">
                <i class="fa-solid fa-gamepad fs-3 about-brand-icon"></i>
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
                        <a class="nav-link text-white" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="games.php">GAMES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link about-active-link" href="about.php">ABOUT</a>
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

    <main>

        <!-- ============================================================
             HERO SECTION
        ============================================================ -->
        <section class="about-hero d-flex align-items-center justify-content-center text-center">
            <div class="about-hero-glow"></div>
            <div class="container position-relative">
                <p class="about-eyebrow">WHO WE ARE</p>
                <h1 class="about-hero-title">
                    About <span class="text-gradient">Games Review</span>
                </h1>
                <p class="about-hero-sub">
                    A crew of passionate gamers turning thousands of hours of play into reviews you<br
                        class="d-none d-md-block"> can actually trust.
                </p>
            </div>
        </section>

        <!-- ============================================================
             OUR STORY + STATS
        ============================================================ -->
        <section class="about-story-section py-5">
            <div class="container py-4">
                <div class="row align-items-center gx-5">

                    <!-- Story text -->
                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <p class="about-eyebrow">OUR STORY</p>
                        <h2 class="about-section-title mb-4">
                            Built by players, <span class="about-highlight">for players</span>
                        </h2>
                        <p class="about-body-text mb-4">
                            Games Review started in 2019 as a small Discord server where four friends shared honest
                            takes on the games they were playing. No fluff, no marketing speak – just real opinions.
                        </p>
                        <p class="about-body-text">
                            Five years and 2,400+ reviews later, we're still doing the same thing – just with a bigger
                            team, more controllers, and a community of half a million gamers who keep us sharp.
                        </p>
                    </div>

                    <!-- Stats grid -->
                    <div class="col-lg-7">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="about-stat-card">
                                    <span class="about-stat-num">5+</span>
                                    <span class="about-stat-label">YEARS</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="about-stat-card">
                                    <span class="about-stat-num">12</span>
                                    <span class="about-stat-label">REVIEWERS</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="about-stat-card">
                                    <span class="about-stat-num">2.4K</span>
                                    <span class="about-stat-label">REVIEWS</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="about-stat-card">
                                    <span class="about-stat-num">500K</span>
                                    <span class="about-stat-label">READERS</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ============================================================
             OUR VALUES
        ============================================================ -->
        <section class="about-values-section py-5">
            <div class="container py-4 text-center">
                <p class="about-eyebrow">WHAT DRIVES US</p>
                <h2 class="about-section-title mb-5">
                    Our <span class="text-gradient">Values</span>
                </h2>

                <div class="row g-4">
                    <!-- Value 1 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="about-value-card">
                            <div class="about-value-icon">
                                <i class="fa-solid fa-circle-dot"></i>
                            </div>
                            <h5 class="about-value-title">Unbiased</h5>
                            <p class="about-value-text">We buy the games we review. No publisher pressure, no
                                compromises – only honest verdicts.</p>
                        </div>
                    </div>
                    <!-- Value 2 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="about-value-card">
                            <div class="about-value-icon">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                            <h5 class="about-value-title">In-Depth</h5>
                            <p class="about-value-text">We play to completion. Every mechanic, every story beat, every
                                frame tested with care.</p>
                        </div>
                    </div>
                    <!-- Value 3 – highlighted -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="about-value-card ">
                            <div class="about-value-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <h5 class="about-value-title">Player-First</h5>
                            <p class="about-value-text">Written by gamers, for gamers. We focus on what matters when you
                                press start.</p>
                        </div>
                    </div>
                    <!-- Value 4 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="about-value-card">
                            <div class="about-value-icon">
                                <i class="fa-solid fa-wand-magic-sparkles"></i>
                            </div>
                            <h5 class="about-value-title">Cutting Edge</h5>
                            <p class="about-value-text">Day-one coverage on the latest releases across PC, PlayStation,
                                Xbox, Switch and mobile.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================
             MEET THE TEAM
        ============================================================ -->
        <section class="about-team-section py-5">
            <div class="container py-4 text-center">
                <p class="about-eyebrow">THE CREW</p>
                <h2 class="about-section-title mb-5">
                    Meet The <span class="text-gradient">Team</span>
                </h2>

                <div class="row justify-content-center g-5">
                    <!-- Member 1 -->
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="about-member">
                            <div class="about-avatar">HG</div>
                            <h6 class="about-member-name">Hamza Gadelrab</h6>
                            <span class="about-member-role">EDITOR-IN-CHIEF</span>
                        </div>
                    </div>
                    <!-- Member 2 -->
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="about-member">
                            <div class="about-avatar">OS</div>
                            <h6 class="about-member-name">Omar Salim</h6>
                            <span class="about-member-role">RPG SPECIALIST</span>
                        </div>
                    </div>
                    <!-- Member 3 -->
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="about-member">
                            <div class="about-avatar">KM</div>
                            <h6 class="about-member-name">Khaled Mohamed</h6>
                            <span class="about-member-role">ESPORTS LEAD</span>
                        </div>
                    </div>
                    <!-- Member 4 -->
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="about-member">
                            <div class="about-avatar">MH</div>
                            <h6 class="about-member-name">Mostafa Hussein</h6>
                            <span class="about-member-role">INDIE CURATOR</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="py-4 mt-auto about-footer">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <a class="navbar-brand text-white d-flex align-items-center gap-2 mb-3 mb-md-0" href="index.php">
                <i class="fa-solid fa-gamepad fs-4 about-brand-icon"></i>
                <span class="text-gradient footer-logo-text m-0 fs-5">GAMES REVIEW</span>
            </a>

            <p class="text-white-50 small m-0 mb-3 mb-md-0">&copy; 2025 Games Review. All rights reserved.</p>

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
