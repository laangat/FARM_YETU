<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "farmers";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user details from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verify user credentials using prepared statement
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username']; // Replace 'name' with the column name in your 'users' table
            $userRole = $row['user_type']; // Fetch the user's role from the database
    
            // Redirect based on user role
            if ($userRole === 'farmer') {
                // Redirect farmers to the farmer's page (e.g., farmer.php)
                header("Location: details.php");
                exit();
            } else if ($userRole === 'buyer') {
                // Redirect buyers to the buyer's page (e.g., index.php)
                header("Location: index_buyer.php");
                exit();
            }
        }
    }
    
    // Redirect back to login page with an error message if login fails
    header("Location: login.php?error=1");
    exit();
    
    // Close connections and statements
    $stmt->close();
    $conn->close();
}
?>