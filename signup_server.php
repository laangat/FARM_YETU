<?php
$host = "localhost";
$username = "root"; // Replace with your actual username
$password = ""; // Replace with your actual password
$database = "farmers";

// Establish a connection to the database
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user details from the form
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password for security
    $role = $_POST["role"]; // Get the selected role

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
    $checkStmt = $conn->prepare($checkEmailQuery);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email already exists. Please use a different email address.";
    } else {
        // SQL query to insert user details into the database
        $insertQuery = "INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("ssss", $username, $email, $password, $role);

        if ($insertStmt->execute()) {
            // Redirect based on user role
            if ($role === 'farmer') {
                header('Location: login.php');
            } else if ($role === 'buyer') {
                header('Location: index_buyer.php');
            } else {
                // Redirect to a default page for other roles
                header('Location: default_page.php');
            }
            exit(); // Ensure that no more code is executed after the redirect
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}
?>
