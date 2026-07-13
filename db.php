<?php
// Database Connection

$host = "mysql";        // Docker Compose service name
$user = "root";
$password = "root";
$database = "studentdb";
$port = 3306;

// Create connection
$conn = new mysqli($host, $user, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Uncomment the line below to test the connection
// echo "Database Connected Successfully!";
?>