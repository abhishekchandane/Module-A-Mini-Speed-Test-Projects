const form = document.getElementById("contactForm");

form.addEventListener("submit", function (event) {

    event.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();

    const nameError = document.getElementById("nameError");
    const emailError = document.getElementById("emailError");
    const messageError = document.getElementById("messageError");
    const success = document.getElementById("success");

    nameError.textContent = "";
    emailError.textContent = "";
    messageError.textContent = "";
    success.textContent = "";

    let valid = true;

    if (name === "") {
        nameError.textContent = "Name is required.";
        valid = false;
    }

    if (email === "" || !email.includes("@") || !email.includes(".")) {
        emailError.textContent = "Enter a valid email.";
        valid = false;
    }

    if (message === "") {
        messageError.textContent = "Message is required.";
        valid = false;
    }

    if (valid) {
        success.textContent = "Form submitted successfully!";
        form.reset();
    }
});