<?php
// contact.php
include 'includes/header.php';
?>

<main>
    <h2>Contact Us</h2>
    <p>If you have any questions or need support, feel free to reach out!</p>
    <form action="#" method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</main>

<?php
include 'includes/footer.php';
?>

