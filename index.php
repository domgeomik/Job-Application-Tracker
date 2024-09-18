<?php
// Include database config
include('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
	<div class="container">
        <h1>Job Application Tracker</h1>
        <p>
            A Job Application Tracker is a tool or system designed to help individuals organize and manage their job search process. <br>It allows users to track details such as job titles, company names, application dates, job descriptions, the status of each application (e.g., applied, interview scheduled, rejected), <br>and any follow-up actions needed. By keeping all this information in one place, users can stay organized, maintain a clear overview of their progress, <br>and avoid missing important deadlines or follow-up opportunities.
        </p>
    </div>
	
	<style>
      
        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1 {
            font-size: 2.5rem;
            color: #333;
        }
        p {
            font-size: 1.2rem;
            color: #555;
        }
    </style>

    <script src="script.js"></script>
</body>
</html>

