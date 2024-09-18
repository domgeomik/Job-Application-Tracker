<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Tracker</title>
</head>
<body>
	<nav>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>This is your dashboard where you can manage your job applications.</p>
    <a href="logout.php">Logout</a>
	</nav>
	

    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="enquiry.php">Enquiry</a></li>
            </ul>
        </nav>
    </header>

    <!-- Slideshow -->
    <div class="slideshow-container">
        <div class="slides fade">
            <img src="pix/pic1.jpg" style="width:100%">
            <div class="text">Track Your Applications</div>
        </div>
        <div class="slides fade">
            <img src="pix/pic4.jpg" style="width:100%">
            <div class="text">Organize Your Jobs</div>
        </div>
        <div class="slides fade">
            <img src="pix/pic5.jpg" style="width:100%">
            <div class="text">Stay Ahead in Job Search</div>
        </div>
        <div class="slides fade">
            <img src="pix/slides2.jpg" style="width:100%">
            <div class="text">Monitor Applications</div>
        </div>
        <div class="slides fade">
            <img src="pix/slides3.jpg" style="width:100%">
            <div class="text">Success is Yours!</div>
        </div>
    </div>

    <script src="script.js"></script>

</body>
</html>

