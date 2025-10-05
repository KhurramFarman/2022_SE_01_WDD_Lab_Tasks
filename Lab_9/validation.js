let form = document.getElementById("registrationForm")

form.addEventListener("submit", (e) => {


    // Get values
    let firstName = document.getElementById("firstName").value.trim();
    let lastName = document.getElementById("lastName").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;

    // Get error spans
    let firstNameError = document.getElementById("firstNameError");
    let lastNameError = document.getElementById("lastNameError");
    let phoneError = document.getElementById("phoneError");
    let emailError = document.getElementById("emailError");
    let passwordError = document.getElementById("passwordError");
    let confirmPasswordError = document.getElementById("confirmPasswordError");

    // Clear previous errors
    firstNameError.innerHTML = "";
    lastNameError.innerHTML = "";
    phoneError.innerHTML = "";
    emailError.innerHTML = "";
    passwordError.innerHTML = "";
    confirmPasswordError.innerHTML = "";

    let hasError = false;

    // First Name Validation

        // Valid First Name
        if (firstName === "") {
            firstNameError.innerHTML = "Please enter your first name.";
            hasError = true;
        }
        else if (firstName.length < 3) {
            firstNameError.innerHTML = "First name must be at least 3 characters.";
            hasError = true;
        }
        else if (firstName.length > 10) {
            firstNameError.innerHTML = "First name must be less than 10 characters.";
            hasError = true;
        }

    // Last Name Validation
        if (lastName === "") {
            lastNameError.innerHTML = "Please enter your last name.";
            hasError = true;
        }
        else if (lastName.length < 3) {
            lastNameError.innerHTML = "Last name must be at least 3 characters.";
            hasError = true;
        }
        else if (lastName.length > 10) {
            lastNameError.innerHTML = "Last name must be less than 10 characters.";
            hasError = true;

        }

    // Phone Validation (basic check)
        if (phone === "") {
            phoneError.innerHTML = "Please enter your phone number.";
            hasError = true;
        }
        else if (!/^\d{11}$/.test(phone)) {
            phoneError.innerHTML = "Please enter a valid 11-digit phone number.";
            hasError = true;
        }

    // Email Validation (basic check)
    if (email === "") {
            emailError.innerHTML = "Please enter your email.";
            hasError = true;
        }
        else if (!/^\S+@\S+\.\S+$/.test(email)) {
            emailError.innerHTML = "Please enter a valid email address.";
            hasError = true;
        }

    // Password Validation
    if (password === "") {
            passwordError.innerHTML = "Please enter your password.";
            hasError = true;
        }
        else if (password.length < 8) {
            passwordError.innerHTML = "Password must be at least 8 characters.";
            hasError = true;
        }
        else if (!/[A-Z]/.test(password)) {
            passwordError.innerHTML = "Password must contain at least one uppercase letter.";
            hasError = true;
        }
        else if (!/[a-zA-Z]/.test(password)) {
            passwordError.innerHTML = "Password must contain at least one alphabet.";
            hasError = true;
        }
        else if (!/[^a-zA-Z0-9]/.test(password)) {
            passwordError.innerHTML = "Password must contain at least one symbol.";
            hasError = true;
        }

    // Confirm Password Validation

        if (confirmPassword === "") {
            confirmPasswordError.innerHTML = "Please confirm your password.";
            hasError = true;
        }
        else if (confirmPassword !== password) {
            confirmPasswordError.innerHTML = "Passwords do not match.";
            hasError = true;
        }

    // Prevent form submission if there are errors
    if (hasError) {
        e.preventDefault();
    }

})




