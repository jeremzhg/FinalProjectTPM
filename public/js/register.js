document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("register-form");

    form.addEventListener("submit", function (e) {
        let isValid = validateForm();
        if (!isValid) {
            e.preventDefault();
            return;
        }

    });

    function validateForm() {
        let isValid = true;


        const teamNameField = document.querySelector(".input-team-name");
        if (!teamNameField.value.trim()) {
            setError(teamNameField, "Team Name is required!");
            isValid = false;
        } else {
            setSuccess(teamNameField);
        }


        const passwordField = document.querySelector(".input-password");
        if (!validatePassword(passwordField.value)) {
            setError(passwordField, "Password must contain at least 8 characters, one uppercase, one lowercase, one number, and one special character.");
            isValid = false;
        } else {
            setSuccess(passwordField);
        }


        const confirmPasswordField = document.querySelector(".input-confirm-password");
        if (confirmPasswordField.value !== passwordField.value) {
            setError(confirmPasswordField, "Password confirmation must match the password.");
            isValid = false;
        } else {
            setSuccess(confirmPasswordField);
        }

        return isValid;
    }

    function validatePassword(password) {
        return password.length >= 8 &&
               /[A-Z]/.test(password) &&
               /[a-z]/.test(password) &&
               /[0-9]/.test(password) &&
               /[^a-zA-Z0-9]/.test(password);
    }

    function setError(input, message) {
        const errorDisplay = input.parentElement.querySelector(".error-message");
        errorDisplay.innerText = message;
        input.classList.add("error");
    }

    function setSuccess(input) {
        const errorDisplay = input.parentElement.querySelector(".error-message");
        errorDisplay.innerText = "";
        input.classList.remove("error");
    }
});
