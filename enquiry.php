<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    echo "Thank you for your enquiry, $name!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enquiry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Enquiry Form</h2>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="message">Message:</label>
        <textarea name="message" required></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

