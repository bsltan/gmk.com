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

$sql = "SELECT * FROM registrations ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Registered Users</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Church</th>
                    <th>Assembly</th>
                    <th>Contact</th>
                    <th>Date of Registration</th>
                </tr>
            </thead>
            <tbody>
    <?php if ($result && $result->num_rows > 0) { ?>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo isset($row["id"]) ? $row["id"] : "N/A"; ?></td>
                <td><?php echo isset($row["name"]) ? $row["name"] : "N/A"; ?></td>
                <td><?php echo isset($row["church"]) ? $row["church"] : "N/A"; ?></td>
                <td><?php echo isset($row["assembly"]) ? $row["assembly"] : "N/A"; ?></td>
                <td><?php echo isset($row["contact"]) ? $row["contact"] : "N/A"; ?></td>
                <td><?php echo isset($row["registration_date"]) ? $row["registration_date"] : "N/A"; ?></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="6" class="text-center">No records found</td>
        </tr>
    <?php } ?>
</tbody>

        <a href="Regestration.php" class="btn btn-primary">Back to Form</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
