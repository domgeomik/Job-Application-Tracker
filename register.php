<?php
// register.php
include 'includes/header.php';
?>

<main>
    <?php
    if(isset($_SESSION['error'])){
        echo "<p class='error'>".htmlspecialchars($_SESSION['error'])."</p>";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['success'])){
        echo "<p class='success'>".htmlspecialchars($_SESSION['success'])."</p>";
        unset($_SESSION['success']);
    }
    ?>
    <form action="register_handler.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
</main>

<?php
include 'includes/footer.php';
?>

