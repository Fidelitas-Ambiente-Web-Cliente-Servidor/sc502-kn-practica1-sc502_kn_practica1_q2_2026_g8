// Array de cursos disponibles
const courses = [
    {
        nombre: "Curso de Héroes",
        descripcion: "Enfocado en el combate, rescate y desarrollo de dones (Clases 1-A y 1-B).",
        imagen: "https://cdn.alfabetajuega.com/alfabetajuega/2022/08/boku-no-hero-academia.jpeg",
        categoria: "Combate"
    },
    {
        nombre: "Curso de Estudios Generales",
        descripcion: "Para estudiantes de bachillerato regular, con opción de transferencia por buen rendimiento (Clases C a E).",
        imagen: "https://areajugones.sport.es/wp-content/uploads/2024/08/my-hero-academia-ua-1.jpg",
        categoria: "General"
    },
    {
        nombre: "Curso de Apoyo",
        descripcion: "Diseñado para inventores y genios que construyen los trajes y artefactos de soporte.",
        imagen: "https://www.cultture.com/pics/2021/06/10-veces-que-my-hero-academia-hizo-que-la-escuela-pareciera-divertida-6.jpg",
        categoria: "Apoyo"
    },
    {
        nombre: "Curso de Gestión",
        descripcion: "Orientado a las relaciones públicas, marketing y gestión de agencias de héroes.",
        imagen: "https://static.anime21.blog.br/2017/04/3-TURMA-DE-NEGOCIOS-1200x675-cropped.png",
        categoria: "Gestión"
    }
];

// Crea una tarjeta de curso con los datos proporcionados
function createCourseCard(course) {
    const article = document.createElement("article");
    article.className = "course-card";

    const img = document.createElement("img");
    img.src = course.imagen;
    img.alt = course.nombre;

    const h3 = document.createElement("h3");
    h3.textContent = course.nombre;

    const p = document.createElement("p");
    p.textContent = course.descripcion;

    const link = document.createElement("a");
    link.className = "button";
    link.href = "#";
    link.textContent = "Ver más";

    article.appendChild(img);
    article.appendChild(h3);
    article.appendChild(p);
    article.appendChild(link);

    return article;
}

// Renderiza todos los cursos en el contenedor del DOM
function renderCourses() {
    const container = document.getElementById("coursesContainer");
    
    if (!container) {
        console.error("Contenedor de cursos no encontrado");
        return;
    }

    courses.forEach(course => {
        const courseCard = createCourseCard(course);
        container.appendChild(courseCard);
    });
}

// Inicializa la página cuando el DOM está completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    renderCourses();
});
