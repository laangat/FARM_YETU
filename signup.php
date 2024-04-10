<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup_style.css">
    <title>Login/Signup</title>
    <script src="signupValidation.js" defer></script>
</head>
<body>
<div class="container">
        <form action="signup_server.php" method="POST">
            <div id="signupForm">
                <!-- Include signup form fields here -->
                <h1>User Sign Up</h1>

                <div>
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" id="name" required>
                    <p class="error-message" id="nameError"></p>
                </div>
                <br>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                    <p class="error-message" id="emailError"></p>
                </div>
                <br>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                    <p class="error-message" id="passwordError"></p>
                </div>
                <br>
                <div>
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                    <p class="error-message" id="confirmPasswordError"></p>
                </div>

                <br>
                <div class="role-select">
                    <label for="role" class="role-label">Select Role:</label>
                        <select id="role" name="role" required>
                            <option value="farmer">Farmer</option>
                            <option value="buyer">Buyer</option>
                        </select>
                </div>

                <br>
                <p>Already have an account? <a href="Login.php">Login here</a></p>
                
                <div>
                    <button type="submit" name="submit">SIGN UP</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
