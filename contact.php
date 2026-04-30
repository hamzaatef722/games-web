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
    <link rel="stylesheet" href="./css/contact.css">
    <title>Contact</title>
</head>

<body>

    <!-- navBar -->
    <nav class="navbar navbar-expand-lg p-4 z-3 position-relative contact-navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand text-white d-flex align-items-center gap-2" href="index.php">
                <i class="fa-solid fa-gamepad fs-3 contact-brand-icon"></i>
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
                        <a class="nav-link text-white" href="games.php">GAMES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link contact-active-link" href="contact.php">CONTACT</a>
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
    <main class="py-5">
        <section class="py-5 text-white min-vh-100">
            <div class="container mt-4">
                <div class="row gx-lg-5 align-items-center">
                    <!-- Left Column: Form -->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <form class="p-4 p-md-5 rounded shadow contact-form-container">
                            <div class="mb-4">
                                <label for="fullName" class="form-label text-white-50">Full Name</label>
                                <input type="text" id="fullName" class="form-control contact-input text-white py-3 shadow-none" placeholder="John Gamer">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label text-white-50">Email Address</label>
                                <input type="email" id="email" class="form-control contact-input text-white py-3 shadow-none" placeholder="you@example.com">
                            </div>
                            <div class="mb-4">
                                <label for="subject" class="form-label text-white-50">Subject</label>
                                <input type="text" id="subject" class="form-control contact-input text-white py-3 shadow-none" placeholder="How can we help?">
                            </div>
                            <div class="mb-4">
                                <label for="message" class="form-label text-white-50">Message</label>
                                <textarea id="message" class="form-control contact-input text-white py-3 shadow-none" rows="5" placeholder="Tell us what's on your mind..."></textarea>
                            </div>
                            <button type="submit" class="btn ctm-btn btn-info w-100 py-3 text-white fw-bold">Send Message</button>
                        </form>
                    </div>

                    <!-- Right Column: Info -->
                    <div class="col-lg-6 px-lg-5">
                        <h2 class="fw-bold mb-4">Why Contact Us?</h2>
                        <ul class="list-unstyled text-white-50 mb-5 lh-lg">
                            <li class="mb-3 d-flex align-items-center">
                                <span class="text-white-50 me-3 fs-5">•</span>
                                Report bugs and issues in our gaming platform
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <span class="text-white-50 me-3 fs-5">•</span>
                                Suggest new features and improvements
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <span class="text-white-50 me-3 fs-5">•</span>
                                Explore partnership and sponsorship opportunities
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <span class="text-white-50 me-3 fs-5">•</span>
                                Get support with your gaming account
                            </li>
                        </ul>

                        <h5 class="fw-bold mb-4 text-white-50">Quick Stats</h5>
                        <ul class="list-unstyled text-white-50 lh-lg">
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fa fa-check text-white-50 me-3"></i>
                                50K+ Active Players
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fa fa-check text-white-50 me-3"></i>
                                24/7 Community Support
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fa fa-check text-white-50 me-3"></i>
                                Tournaments Every Month
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="py-4 mt-auto contact-footer">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <a class="navbar-brand text-white d-flex align-items-center gap-2 mb-3 mb-md-0" href="index.php">
                <i class="fa-solid fa-gamepad fs-4 contact-brand-icon"></i>
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
