<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance_db";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT * FROM registrations ORDER BY id DESC";
$result = $conn->query($sql);

// Create CSV file
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=attendance_data.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Name', 'Church', 'Assembly', 'Contact', 'Registration Date'));

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$conn->close();
?>
