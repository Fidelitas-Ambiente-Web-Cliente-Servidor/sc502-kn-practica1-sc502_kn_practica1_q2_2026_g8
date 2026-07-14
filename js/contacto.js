// Referencias a los campos del formulario
const form = document.querySelector(".contacto-form-card form");
const nombreInput = document.getElementById("nombre");
const correoInput = document.getElementById("correo");
const telefonoInput = document.getElementById("telefono");
const asuntoInput = document.getElementById("asunto");
const mensajeInput = document.getElementById("mensaje");
const btnEnviar = document.getElementById("btnEnviar");
const successMessage = document.getElementById("successMessage");

// Expresiones regulares usadas en las validaciones
const regexNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{5,}$/;
const regexCorreo = /^[\w.+-]+@[\w-]+\.[A-Za-z]{2,}$/;
const regexTelefono = /^\d{8,}$/;

// Valida el nombre: mínimo 5 caracteres, solo letras y espacios
function validarNombre() {
    const valor = nombreInput.value.trim();
    const errorSpan = document.getElementById("error-nombre");

    if (!regexNombre.test(valor)) {
        errorSpan.textContent = "El nombre debe tener al menos 5 letras y solo puede contener letras y espacios.";
        return false;
    }

    errorSpan.textContent = "";
    return true;
}

// Valida el correo con una expresión regular básica de formato
function validarCorreo() {
    const valor = correoInput.value.trim();
    const errorSpan = document.getElementById("error-correo");

    if (!regexCorreo.test(valor)) {
        errorSpan.textContent = "Ingresa un correo electrónico válido.";
        return false;
    }

    errorSpan.textContent = "";
    return true;
}

// Valida el teléfono: solo números, mínimo 8 dígitos
function validarTelefono() {
    const valor = telefonoInput.value.trim();
    const errorSpan = document.getElementById("error-telefono");

    if (!regexTelefono.test(valor)) {
        errorSpan.textContent = "El teléfono debe tener al menos 8 dígitos y solo números.";
        return false;
    }

    errorSpan.textContent = "";
    return true;
}

// Valida el asunto: mínimo 3 caracteres
function validarAsunto() {
    const valor = asuntoInput.value.trim();
    const errorSpan = document.getElementById("error-asunto");

    if (valor.length < 3) {
        errorSpan.textContent = "El asunto debe tener al menos 3 caracteres.";
        return false;
    }

    errorSpan.textContent = "";
    return true;
}

// Valida el mensaje: mínimo 20 caracteres
function validarMensaje() {
    const valor = mensajeInput.value.trim();
    const errorSpan = document.getElementById("error-mensaje");

    if (valor.length < 20) {
        errorSpan.textContent = "El mensaje debe tener al menos 20 caracteres.";
        return false;
    }

    errorSpan.textContent = "";
    return true;
}

// Revisa los 5 campos y habilita el botón solo si todos son válidos
function actualizarBoton() {
    const todoValido =
        validarNombre() &&
        validarCorreo() &&
        validarTelefono() &&
        validarAsunto() &&
        validarMensaje();

    btnEnviar.disabled = !todoValido;
}

// Inicializa los eventos cuando el DOM está completamente cargado
document.addEventListener("DOMContentLoaded", function () {
    nombreInput.addEventListener("input", actualizarBoton);
    correoInput.addEventListener("input", actualizarBoton);
    telefonoInput.addEventListener("input", actualizarBoton);
    asuntoInput.addEventListener("input", actualizarBoton);
    mensajeInput.addEventListener("input", actualizarBoton);

    // Tarea 2: simulaba el envío en el navegador sin backend.
    // Comentado (no eliminado) para Tarea 4 - ahora el formulario
    // se envía de verdad por POST a ContactoController::store() (Tarea 3 - MVC).
    // form.addEventListener("submit", function (evento) {
    //     evento.preventDefault();
    //
    //     successMessage.textContent = "¡Tu mensaje fue enviado con éxito! Te contactaremos pronto.";
    //     successMessage.classList.add("visible");
    //
    //     form.reset();
    //     btnEnviar.disabled = true;
    // });
});
