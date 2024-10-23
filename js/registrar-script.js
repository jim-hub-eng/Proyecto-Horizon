function validateForm() {
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const errorMessage = document.getElementById("errorMessage");

    errorMessage.style.opacity = 0; // Oculta el mensaje de error

    if (username === "" || email === "" || password === "" || confirmPassword === "") {
        showError("Todos los campos son obligatorios.");
        return false;
    }

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        showError("Por favor, ingresa un correo electrónico válido.");
        return false;
    }

    if (password !== confirmPassword) {
        showError("Las contraseñas no coinciden.");
        return false;
    }

    if (password.length < 6) {
        showError("La contraseña debe tener al menos 6 caracteres.");
        return false;
    }

    alert("Registro exitoso!");
    return true;
}

function showError(message) {
    const errorMessage = document.getElementById("errorMessage");
    errorMessage.innerHTML = message;
    errorMessage.style.opacity = 1; // Muestra el mensaje de error con animación
}
