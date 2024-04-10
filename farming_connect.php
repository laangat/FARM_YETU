<?php
// Validate form data
if (empty($planting_date) || empty($crops_planted) || empty($seed_input_kg) || empty($fertilizer_type) || empty($fertilizer_amount_paid) || empty($no_of_times_weeded) || empty($labour_amount_used) || empty($no_of_times_insecticide_applied) || empty($type_of_insecticide) || empty($price_of_insecticide)) {
    echo "All fields are required!";
} else {
    // Continue with the database insertion logic

    // Start or resume a session
    session_start();

    // Check if the user is logged in (example using session, adjust based on your authentication method)
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login page or handle unauthorized access
        header("Location: login.php"); // Change this to your login page
        exit;
    }

    // Get the logged-in user ID
    $user_id = $_SESSION['user_id'];

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

    // Sanitize and validate form data (already performed)

    // Prepare and execute SQL query to insert form data into the database
    $sql = "INSERT INTO farming_details (user_id, planting_date, crops_planted, seed_input_kg, fertilizer_type, fertilizer_amount_paid, no_of_times_weeded, labour_amount_used, no_of_times_insecticide_applied, type_of_insecticide, price_of_insecticide) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("issssissssi", $user_id, $planting_date, $crops_planted, $seed_input_kg, $fertilizer_type, $fertilizer_amount_paid, $no_of_times_weeded, $labour_amount_used, $no_of_times_insecticide_applied, $type_of_insecticide, $price_of_insecticide);

    // Execute prepared statement
    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();
}
?>