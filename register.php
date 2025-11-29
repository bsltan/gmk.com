<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $church = $_POST['church'];
    $assembly = $_POST['assembly'];
    $contact = $_POST['contact'];
    $registration_date = $_POST['registration_date'];

    $sql = "INSERT INTO registrations (name, church, assembly, contact, registration_date) 
            VALUES ('$name', '$church', '$assembly', '$contact', '$registration_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
