<?php
session_start();
$host = 'localhost';
$db = 'job_tracker';
$user = 'root';
$pass = '';

// Connect to database
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Check if username exists
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Verify password
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];  // Save user role in session

        header('Location: dashboard.php');  // Redirect to user dashboard
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "Username does not exist.";
}

$conn->close();
?>

