<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup_style.css">
    <title>Login/Signup</title>
    <script src="loginValidation.js" defer></script>
</head>
<body>
    <div class="container">
    <form action="login_server.php" method="POST">
        <div id="loginForm">
            <h2>Login Here</h2>
            <!-- Include login form fields here -->
            <div>
                <label for="name">Full Name:</label>
                <br>
                <input type="text" name="name" id="name" required>
            </div>
            <br>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <br>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <br><br>
            <p>Don't have an account yet? <a href="signup.php">Sign up here</a></p>
            <br>
            <div class="button">
                <button type="submit" name="submit">LOGIN</button>
            </div>
            <div>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </form>
    </div>
</body>
</html>
