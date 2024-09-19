<?php
// includes/header.php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Application Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="slideshow-container">
            <div class="slides fade">
                <img src="includes/1.png" alt="Banner 1">
                <div class="slide-text"><a href="register.php">Register</a></div>
            </div>
            <div class="slides fade">
                <img src="includes/2.png" alt="Banner 2">
                <div class="slide-text"><a href="login.php">Login</a></div>
            </div>
            <div class="slides fade">
                <img src="includes/3.png" alt="Banner 3">
                <div class="slide-text"><a href="dashboard.php">Dashboard</a></div>
            </div>
            <div class="slides fade">
                <img src="includes/4.png" alt="Banner 4">S
                <div class="slide-text"><a href="contact.php">Contact</a></div>
            </div>
            <div class="slides fade">
                <img src="includes/5.png" alt="Banner 5">
                <div class="slide-text"><a href="about.php">About</a></div>
            </div>
            <!-- Navigation Buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <nav>
            <?php if(isset($_SESSION['username'])): ?>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a>
            <?php else: ?>
                <a href="index.php">Home</a>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>
    </header>

