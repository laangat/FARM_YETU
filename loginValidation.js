// Function to validate the login form
function validateLoginForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Validate email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    // Validate password presence
    if (password.trim() === '') {
        alert('Please enter your password.');
        return false;
    }

    // If all validations pass, submit the form
    return true;
}

// Event listener for login form submission
document.getElementById('loginForm').addEventListener('submit', function(event) {
    if (!validateLoginForm()) {
        // If validation fails, prevent the form from being submitted
        event.preventDefault();
    }
    // Allow the form to be submitted if validation passes
});

