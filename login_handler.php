<?php
// php/login_handler.php
session_start();
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Validate inputs (optional but recommended)
    if(empty($username) || empty($password)){
        $_SESSION['error'] = "All fields are required.";
        header("Location: ./login.php");
        exit();
    }

    // Fetch user data
    $stmt = $conn->prepare("SELECT id, password FROM users1 WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if($stmt->num_rows == 1){
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        if(password_verify($password, $hashed_password)){
            // Password is correct, start a new session
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            header("Location: ./dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid password.";
            header("Location: ./login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "User not found.";
        header("Location: ./login.php");
        exit();
    }
    $stmt->close();
    $conn->close();
}
?>

