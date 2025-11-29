<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $church = $_POST['church'];
    $assembly = $_POST['assembly'];
    $contact = $_POST['contact'];
    $registration_date = $_POST['registration_date'];

    $sql = "UPDATE registrations SET 
            name='$name', 
            church='$church', 
            assembly='$assembly', 
            contact='$contact', 
            registration_date='$registration_date' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully!'); window.location.href='view_entries.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "SELECT * FROM registrations WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Entry</h2>
        <form action="edit_entry.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label class="form-label">Enter Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Church</label>
                <input type="text" name="church" class="form-control" value="<?php echo $row['church']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Assembly</label>
                <input type="text" name="assembly" class="form-control" value="<?php echo $row['assembly']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Contact (Optional)</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $row['contact']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Date of Registration</label>
                <input type="date" name="registration_date" class="form-control" value="<?php echo $row['registration_date']; ?>" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="view_entries.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
