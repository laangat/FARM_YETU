// Name Validation
const nameInput = document.getElementById('name');
const nameErrorMessage = document.getElementById('nameError');

nameInput.addEventListener('input', () => {
    nameErrorMessage.textContent = nameInput.value.trim() === '' ? 'Name field is required' : '';
});

// Email Validation
const emailInput = document.getElementById('email');
const emailErrorMessage = document.getElementById('emailError');

emailInput.addEventListener('input', () => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    emailErrorMessage.textContent = emailRegex.test(emailInput.value) ? '' : 'Invalid email format';
});

// Check for Existing Email
let emailTimeout;
emailInput.addEventListener('input', () => {
    clearTimeout(emailTimeout);
    emailTimeout = setTimeout(() => {
        checkEmailExists(emailInput.value);
    }, 500); // Delay to minimize API requests, adjust as needed
});

// Password Validation
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm_password');
const passwordErrorMessage = document.getElementById('passwordError');
const confirmPasswordErrorMessage = document.getElementById('confirmPasswordError');

passwordInput.addEventListener('input', () => {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{8,}$/;
    passwordErrorMessage.textContent = passwordRegex.test(passwordInput.value) ? '' :
        'Password must have at least 8 characters, one uppercase letter, one lowercase letter, one number, and one special character';
});

confirmPasswordInput.addEventListener('input', () => {
    const passwordMatch = passwordInput.value === confirmPasswordInput.value;
    confirmPasswordErrorMessage.textContent = passwordMatch ? '' : 'Passwords do not match';
});

// Form Submission Validation
const form = document.querySelector('form');
form.addEventListener('submit', (event) => {
    const errorMessages = form.querySelectorAll('.error-message');
    errorMessages.forEach((errorMessage) => {
        errorMessage.textContent = '';
    });

    if (nameInput.value.trim() === '') {
        nameErrorMessage.textContent = 'Name field is required';
        event.preventDefault();
    }

    // Other validation checks for email and password...

    // Check if passwords match
    if (passwordInput.value !== confirmPasswordInput.value) {
        confirmPasswordErrorMessage.textContent = 'Passwords do not match';
        event.preventDefault();
    }
});

// Function to check for existing email (replace with your actual API call)
const checkEmailExists = async (email) => {
    try {
        // Simulating an API call
        const data = { exists: false }; // Replace this with your actual response data
        if (data.exists) {
            emailErrorMessage.textContent = 'Email already exists';
        } else {
            emailErrorMessage.textContent = '';
        }
    } catch (error) {
        console.error(error);
    }
};