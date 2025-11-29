<?php
require('tcpdf/tcpdf.php');

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

// Create PDF object
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('GMK FUNCTIONS');
$pdf->SetTitle('Attendance Report');
$pdf->SetHeaderData('', '', 'GMK FUNCTIONS Attendance Report', '');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

// Add table header
$html = '<h2>GMK FUNCTIONS Attendance Report</h2>';
$html .= '<table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Church</th>
                <th>Assembly</th>
                <th>Contact</th>
                <th>Registration Date</th>
            </tr>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $row["id"] . '</td>
                <td>' . $row["name"] . '</td>
                <td>' . $row["church"] . '</td>
                <td>' . $row["assembly"] . '</td>
                <td>' . $row["contact"] . '</td>
                <td>' . $row["registration_date"] . '</td>
              </tr>';
}

$html .= '</table>';

// Output PDF
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('attendance_report.pdf', 'D');  // 'D' forces download

$conn->close();
?>
