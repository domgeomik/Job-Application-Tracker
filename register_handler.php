<?php
// php/register_handler.php
session_start();
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
    
    // Validate inputs (optional but recommended)
    if(empty($username) || empty($email) || empty($password)){
        $_SESSION['error'] = "All fields are required.";
        header("Location: ./register.php");
        exit();
    }

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT id FROM users1 WHERE username=? OR email=?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();
    
    if($stmt->num_rows > 0){
        $_SESSION['error'] = "Username or Email already exists.";
        $stmt->close();
        header("Location: ./register.php");
        exit();
    }
    $stmt->close();
    
    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users1 (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    
    if($stmt->execute()){
        $_SESSION['success'] = "Registration successful. Please login.";
        header("Location: ../login.php");
    } else {
        $_SESSION['error'] = "Registration failed. Please try again.";
        header("Location: ../register.php");
    }
    $stmt->close();
    $conn->close();
}
?>

