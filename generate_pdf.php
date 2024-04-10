<?php
// Include the FPDF library
require('fpdf/fpdf.php');

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farming_details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database (example query)
$user_id = $_SESSION['user_id']; // Assuming user ID is stored in session

$sql = "SELECT * FROM farming_details WHERE user_id = '$user_id'";
$result = $conn->query($sql);

// Initialize PDF object
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Title of the report
$pdf->Cell(0, 10, 'Farming Details Report', 0, 1, 'C');

// Fetch and display data in the PDF
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Ln(); // Add a new line

        // Display fetched data in the PDF
        $pdf->Cell(40, 10, 'Planting Date:', 0);
        $pdf->Cell(60, 10, $row['planting_date'], 0);

        // Display other fields similarly
        // ...

        // You can adjust cell width, position, and data display based on your requirements
    }
} else {
    $pdf->Cell(0, 10, 'No data found', 0, 1, 'C');
}

// Output the PDF to the browser for download
$pdf->Output('Farming_Details_Report.pdf', 'D'); // 'D' to force download

$conn->close();
?>
