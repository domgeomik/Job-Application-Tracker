<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.html');
    exit();
}

echo "<h1>Admin Dashboard</h1>";

// Fetch and display all jobs
$host = 'localhost';
$db = 'job_tracker';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT jobs.*, users.username FROM jobs JOIN users ON jobs.user_id = users.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row['company_name'] . "</strong> - " . $row['job_title'] . " (" . $row['application_status'] . ") by " . $row['username'] . "</p>";
    }
} else {
    echo "No job applications found.";
}

$conn->close();
?>

