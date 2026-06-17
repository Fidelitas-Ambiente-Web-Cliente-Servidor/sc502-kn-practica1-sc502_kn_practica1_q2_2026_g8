/* ========================================
   INFORMACIÓN DE LOS PROFESORES
======================================== */

const profesores = [
{
    nombre: "Shota Aizawa",
    especialidad: "Profesor Principal",

    descripcion:
    "Conocido como Eraser Head. Especialista en combate táctico, estrategia y control de dones.",

    foto:
    "https://via.placeholder.com/400x300?text=Shota+Aizawa",

    correo:
    "aizawa@ua.edu",

    cursosQueImparte: [
        "Combate Táctico",
        "Control de Dones",
        "Estrategia Heroica"
    ]
},

{
    nombre: "All Might",
    especialidad: "Entrenamiento Heroico",

    descripcion:
    "Símbolo de la Paz. Enseña liderazgo, ética profesional y desarrollo del potencial heroico.",

    foto:
    "https://via.placeholder.com/400x300?text=All+Might",

    correo:
    "allmight@ua.edu",

    cursosQueImparte: [
        "Liderazgo",
        "Entrenamiento Heroico",
        "Ética Profesional"
    ]
},

{
    nombre: "Present Mic",
    especialidad: "Comunicación Heroica",

    descripcion:
    "Especialista en comunicación, relaciones públicas y manejo de medios.",

    foto:
    "https://via.placeholder.com/400x300?text=Present+Mic",

    correo:
    "presentmic@ua.edu",

    cursosQueImparte: [
        "Oratoria",
        "Comunicación Heroica",
        "Relaciones Públicas"
    ]
},

{
    nombre: "Thirteen",
    especialidad: "Rescate y Emergencias",

    descripcion:
    "Experta en operaciones de rescate, evacuación y protección de civiles.",

    foto:
    "https://via.placeholder.com/400x300?text=Thirteen",

    correo:
    "thirteen@ua.edu",

    cursosQueImparte: [
        "Rescate",
        "Emergencias",
        "Protección Civil"
    ]
}
];


/* ========================================
   RENDERIZAR TARJETAS
======================================== */

// Contenedor donde se mostrarán los profesores
const profesoresGrid =
document.getElementById("profesoresGrid");


// Crear las tarjetas dinámicamente
profesores.forEach((profesor, index) => {

    profesoresGrid.innerHTML += `
        <article
            class="profesor-card"
            data-id="${index}">

            <img
                src="${profesor.foto}"
                alt="${profesor.nombre}">

            <h3>${profesor.nombre}</h3>

            <span>
                ${profesor.especialidad}
            </span>

            <p>
                ${profesor.descripcion}
            </p>

        </article>
    `;
});


/* ========================================
   REFERENCIAS DEL MODAL
======================================== */

const modal =
document.getElementById("modalProfesor");

const detalleProfesor =
document.getElementById("detalleProfesor");

const cerrarModal =
document.getElementById("cerrarModal");


/* ========================================
   ABRIR MODAL
======================================== */

// Detecta el clic en cualquier tarjeta
document.addEventListener("click", function(evento) {

    const tarjeta =
    evento.target.closest(".profesor-card");

    if (!tarjeta) {
        return;
    }

    // Obtener el índice almacenado en data-id
    const idProfesor =
    tarjeta.dataset.id;

    const profesor =
    profesores[idProfesor];

    // Mostrar información completa
    detalleProfesor.innerHTML = `
        <div class="detalle-profesor">

            <img
                src="${profesor.foto}"
                alt="${profesor.nombre}">

            <h2>
                ${profesor.nombre}
            </h2>

            <h4>
                ${profesor.especialidad}
            </h4>

            <p>
                ${profesor.descripcion}
            </p>

            <p>
                <strong>Correo:</strong>
                ${profesor.correo}
            </p>

            <h4>
                Cursos que imparte
            </h4>

            <ul>
                ${profesor.cursosQueImparte
                    .map(curso => `<li>${curso}</li>`)
                    .join("")}
            </ul>

        </div>
    `;

    modal.style.display = "flex";
});


/* ========================================
   CERRAR MODAL CON BOTÓN
======================================== */

cerrarModal.addEventListener("click", () => {

    modal.style.display = "none";

});


/* ========================================
   CERRAR MODAL AL HACER CLIC AFUERA
======================================== */

window.addEventListener("click", (evento) => {

    if (evento.target === modal) {

        modal.style.display = "none";

    }

});