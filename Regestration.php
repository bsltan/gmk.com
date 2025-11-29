<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GMK FUNCTIONS Attendance Tracking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">GMK FUNCTIONS Attendance Tracking</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Enter Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enter Church</label>
                            <input type="text" name="church" class="form-control" placeholder="Enter Church" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enter Assembly</label>
                            <input type="text" name="assembly" class="form-control" placeholder="Enter Assembly" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enter Contact (Optional)</label>
                            <input type="text" name="contact" class="form-control" placeholder="Enter Contact">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enter Date of Registration</label>
                            <input type="date" name="registration_date" class="form-control" required>
                        </div>
                        <div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-secondary" onclick="location.href='view_entries.php'">View Entries</button>
    <button type="button" class="btn btn-warning" onclick="location.href='edit_entry.php'">Edit</button>
    <button type="button" class="btn btn-danger" onclick="location.href='generate_pdf.php'">Print (PDF)</button>
    <button type="button" class="btn btn-success" onclick="location.href='generate_csv.php'">Download CSV</button>
</div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <img src="pic.jpg" alt="Profile" class="rounded-circle m-5" width="300" height="300">
                <p class="text-muted">System managed by Steve & Felix</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>