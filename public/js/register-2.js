document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("register-form");
    const emailFields = document.querySelectorAll("input[type='email']");
    const whatsappField = document.getElementById("leader_whatsapp");
    const birthDateField = document.getElementById("leader_birth_date");
    const cvUploadField = document.getElementById("upload_cv");
    const flazzUploadField = document.getElementById("upload-flazz");
    const radioButtons = document.querySelectorAll("input[name='status']");
    const registerButton = document.querySelector(".button-register");
    const uploadLabel = document.getElementById("upload-label");
    const binusianRadio = document.getElementById("binusian");
    const nonBinusianRadio = document.getElementById("non-binusian");

    const members = [
        { name: document.getElementById("member_1"), email: document.getElementById("member_1_email") },
        { name: document.getElementById("member_2"), email: document.getElementById("member_2_email") },
        { name: document.getElementById("member_3"), email: document.getElementById("member_3_email") }
    ];

    function updateLabel() {
        if (binusianRadio.checked) {
            uploadLabel.textContent = "Upload FLAZZ Card (Leader Only)";
        } else if (nonBinusianRadio.checked) {
            uploadLabel.textContent = "Upload ID Card (Leader Only)";
        }
    }

    binusianRadio.addEventListener("change", updateLabel);
    nonBinusianRadio.addEventListener("change", updateLabel);
    updateLabel();

    form.addEventListener("submit", function (e) {
        clearAllErrors();
        let isValid = validateForm();

        if (!isValid) {
            e.preventDefault();
            return;
        }
    });

    function validateForm() {
        let isValid = true;


        document.querySelectorAll("input:not([type='file'])").forEach(input => {
            if (!input.value.trim()) {
                showErrorMessage(input, `${getInputLabel(input)} cannot be empty`);
                isValid = false;
            }
        });


        emailFields.forEach(email => {
            if (email.value.trim() && !email.value.includes("@")) {
                showErrorMessage(email, "Enter a valid email (e.g. user@gmail.com)");
                isValid = false;
            }
        });


        members.forEach(({ name, email }) => {
            if (name.value.trim() && !email.value.trim()) {
                showErrorMessage(email, "Email is required when name is provided");
                isValid = false;
            } else if (!name.value.trim() && email.value.trim()) {
                showErrorMessage(name, "Name is required when email is provided");
                isValid = false;
            }
        });


        if (whatsappField.value.length < 9) {
            showErrorMessage(whatsappField, "WhatsApp number must be at least 9 characters long");
            isValid = false;
        }


        if (birthDateField.value) {
            const birthDate = new Date(birthDateField.value);
            const today = new Date();
            const age = today.getFullYear() - birthDate.getFullYear();
            if (age < 17) {
                showErrorMessage(birthDateField, "You must be at least 17 years old");
                isValid = false;
            }
        } else {
            showErrorMessage(birthDateField, "Please enter your birth date");
            isValid = false;
        }


        if (!validateFileUpload(cvUploadField, ["pdf"], "CV must be in .pdf format")) isValid = false;
        if (!validateFileUpload(flazzUploadField, ["pdf", "jpg", "jpeg", "png"], "FLAZZ Card must be in .pdf, .jpg, .jpeg, or .png format")) isValid = false;


        const isChecked = Array.from(radioButtons).some(radio => radio.checked);
        if (!isChecked) {
            showErrorMessage(radioButtons[0], "Please select Binusian or Non-Binusian");
            isValid = false;
        }

        return isValid;
    }

    function validateFileUpload(fileInput, allowedExtensions, errorMessage) {
        clearErrorMessage(fileInput);

        const file = fileInput.files[0];
        if (!file) {
            showErrorMessage(fileInput, `${getInputLabel(fileInput)} is required`);
            return false;
        }

        const fileName = file.name;
        const fileExtension = fileName.split(".").pop().toLowerCase();
        if (!allowedExtensions.includes(fileExtension)) {
            showErrorMessage(fileInput, errorMessage);
            return false;
        }

        return true;
    }

    function getInputLabel(input) {
        const label = document.querySelector(`label[for='${input.id}']`);
        return label ? label.textContent : "This field";
    }

    function showErrorMessage(input, message) {
        clearErrorMessage(input);

        const errorSpan = document.createElement("span");
        errorSpan.classList.add("error-message");
        errorSpan.textContent = message;
        errorSpan.style.color = "red";
        errorSpan.style.fontSize = "14px";
        errorSpan.style.marginTop = "5px";
        errorSpan.style.display = "block";

        if (input.type === "file") {
            input.closest("div").appendChild(errorSpan);
        } else {
            input.parentNode.insertBefore(errorSpan, input.nextSibling);
        }
    }

    function clearErrorMessage(input) {
        const existingError = input.closest("div").querySelector(".error-message");
        if (existingError) {
            existingError.remove();
        }
    }

    function clearAllErrors() {
        document.querySelectorAll(".error-message").forEach(error => error.remove());
    }


    function setupFileUpload(inputId, containerClass) {
        const fileInput = document.getElementById(inputId);
        const fileTextField = fileInput.closest(`.${containerClass}`).querySelector(".upload-field");

        fileInput.addEventListener("change", function () {
            if (fileInput.files.length > 0) {
                fileTextField.value = fileInput.files[0].name;
                clearErrorMessage(fileInput); 
            } else {
                fileTextField.value = "";
            }
        });
    }

    setupFileUpload("upload_cv", "upload-cv-container");
    setupFileUpload("upload-flazz", "upload-flazz-container");
});
