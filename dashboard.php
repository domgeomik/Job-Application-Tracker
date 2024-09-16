<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}

echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";

if ($_SESSION['role'] === 'admin') {
    echo "<a href='admin_dashboard.php'>Go to Admin Dashboard</a>";
}

?>

<a href="add_job.php">Add New Job Application</a>
<a href="view_jobs.php">View My Job Applications</a>
<a href="logout.php">Logout</a>

