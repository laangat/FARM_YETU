
<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farm_yetu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the search criteria from the user
$searchCriteria = $_GET['search'];

// Sanitize the search criteria to prevent SQL injection
$searchCriteria = mysqli_real_escape_string($conn, $searchCriteria);

// Perform the search query
$sql = "SELECT * FROM farmers WHERE name LIKE '%$searchCriteria%' OR location LIKE '%$searchCriteria%' OR products LIKE '%$searchCriteria%'";
$result = $conn->query($sql);

// Check if any results were found
if ($result->num_rows > 0) {
    // Display the search results as cards
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>Location: " . $row['location'] . "</p>";
        echo "<p>Products: " . $row['products'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No farmers found matching the search criteria.";
}

// Close the database connection
$conn->close();
?>
