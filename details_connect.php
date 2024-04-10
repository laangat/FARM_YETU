<?php
session_start(); // Start the user session

$servername = "localhost";
$username = "root";
$password = "";
$countiesDB = "counties"; // Replace with your actual county database name
$detailsDB = "details"; // Replace with your actual details database name

// Create connection to the county database
$connCounties = new mysqli($servername, $username, $password, $countiesDB);
// Check connection
if ($connCounties->connect_error) {
    die("Connection to counties database failed: " . $connCounties->connect_error);
}

// Fetch dropdown data from counties database for County
$sqlCounty = "SELECT county_id, county_name FROM county"; // Replace with your county table name
$resultCounty = $connCounties->query($sqlCounty);

$countyData = array();
if ($resultCounty->num_rows > 0) {
    while ($rowCounty = $resultCounty->fetch_assoc()) {
        $countyData[] = $rowCounty;
    }
}

// Output data as JSON for County dropdown
if (isset($_GET['county_id'])) {
    $countyId = $_GET['county_id'];

    $sqlConstituency = "SELECT constituency_id, constituency_name FROM constituency WHERE county_id = $countyId"; // Replace with your constituency table name
    $resultConstituency = $connCounties->query($sqlConstituency);

    $constituencyData = array();
    if ($resultConstituency->num_rows > 0) {
        while ($rowConstituency = $resultConstituency->fetch_assoc()) {
            $constituencyData[] = $rowConstituency;
        }
    }

    // Output data as JSON for Constituency dropdown
    header('Content-Type: application/json');
    echo json_encode($constituencyData);
} elseif (isset($_GET['constituency_id'])) {
    $constituencyId = $_GET['constituency_id'];

    $sqlWard = "SELECT ward_id, ward_name FROM wards WHERE constituency_id = $constituencyId"; // Replace with your ward table name
    $resultWard = $connCounties->query($sqlWard);

    $wardData = array();
    if ($resultWard->num_rows > 0) {
        while ($rowWard = $resultWard->fetch_assoc()) {
            $wardData[] = $rowWard;
        }
    }

    // Output data as JSON for Ward dropdown
    header('Content-Type: application/json');
    echo json_encode($wardData);
} else {
    // Output data as JSON for County dropdown
    header('Content-Type: application/json');
    echo json_encode($countyData);
}

// Close connection to the counties database
$connCounties->close();

// Form submission to details database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $county = $_POST['county'];
    $constituency = $_POST['constituency'];
    $ward = $_POST['ward'];
    $farmSize = $_POST['farmSize'];
    $phoneNumber = $_POST['phoneNumber'];

    // Assuming you have established the database connection for the details database
    $connDetails = new mysqli($servername, $username, $password, $detailsDB);
    // Check connection
    if ($connDetails->connect_error) {
        die("Connection to details database failed: " . $connDetails->connect_error);
    }

    // Retrieve user_id from the session
    $user_id = $_SESSION['user_id']; // Replace with your actual session handling

    // Prepare and execute INSERT query for details database
    $insert_details_query = "INSERT INTO user_details (user_id, county, constituency, ward, farm_size, phone_number) 
                            VALUES ('$user_id', '$county', '$constituency', '$ward', '$farmSize', '$phoneNumber')";

    if ($connDetails->query($insert_details_query) === TRUE) {
        // Redirect the user to index.php upon successful insertion
        header("Location: index_farmer.php");
        exit();
    } else {
        echo "Error: " . $insert_details_query . "<br>" . $connDetails->error;
    }

    // Close connection to the details database
    $connDetails->close();
}
?>
