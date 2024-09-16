<?php
// Database connection
$host = 'localhost';
$db = 'job_tracker';
$user = 'root';
$pass = '';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$company_name = $_POST['company'];
$job_title = $_POST['title'];
$job_description = $_POST['description'];
$application_status = $_POST['status'];
$date_applied = $_POST['date_applied'];

// Insert into database
$sql = "INSERT INTO jobs (company_name, job_title, job_description, application_status, date_applied) 
        VALUES ('$company_name', '$job_title', '$job_description', '$application_status', '$date_applied')";

if ($conn->query($sql) === TRUE) {
    echo "Job application added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

