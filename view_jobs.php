<?php
$host = 'localhost';
$db = 'job_tracker';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

$jobs = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
}

$conn->close();

echo json_encode($jobs);
?>

