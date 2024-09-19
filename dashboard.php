<?php
// dashboard.php
include 'includes/header.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
require 'db_connect.php';

$user_id = $_SESSION['user_id'];

// Handle adding new job application
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_job'])) {
    $company = trim($_POST['company']);
    $position = trim($_POST['position']);
    $status = trim($_POST['status']);
    $date_applied = $_POST['date_applied'];
    $notes = trim($_POST['notes']);
    
    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO jobs1 (user_id, company, position, status, date_applied, notes) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $user_id, $company, $position, $status, $date_applied, $notes);
    
    if($stmt->execute()){
        $_SESSION['success'] = "Job application added successfully.";
    } else {
        $_SESSION['error'] = "Failed to add job application.";
    }
    $stmt->close();
    header("Location: dashboard.php");
    exit();
}

// Fetch user's job applications
$stmt = $conn->prepare("SELECT * FROM jobs1 WHERE user_id=? ORDER BY date_applied DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$jobs = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>

<main>
    <section class="add-job">
        <h2>Add New Job Application</h2>
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
        <form method="POST" action="">
            <input type="text" name="company" placeholder="Company" required>
            <input type="text" name="position" placeholder="Position" required>
            <input type="text" name="status" placeholder="Status" required>
            <input type="date" name="date_applied" placeholder="Date Appl" required>
            <textarea name="notes" placeholder="Notes"></textarea>
            <button type="submit" name="add_job">Add Job</button>
        </form>
    </section>
    <section class="job-list">
        <h2>Your Job Applications</h2>
        <?php if(count($jobs) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Date Applied</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($jobs as $job): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($job['company']); ?></td>
                            <td><?php echo htmlspecialchars($job['position']); ?></td>
                            <td><?php echo htmlspecialchars($job['status']); ?></td>
                            <td><?php echo htmlspecialchars($job['date_applied']); ?></td>
                            <td><?php echo htmlspecialchars($job['notes']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No job applications found. Start by adding a new job.</p>
        <?php endif; ?>
    </section>
</main>

<?php
include 'includes/footer.php';
?>

