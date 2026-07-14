
 /*
   |--------------------------------------------------------------------------
| CÓDIGO DE TAREA 1 CONSERVADO PARA TAREA 4
|--------------------------------------------------------------------------

const courses = [
  
    {
        nombre: "Curso de Héroes",
        descripcion: "Enfocado en el combate, rescate y desarrollo de dones.",
        imagen: "https://cdn.alfabetajuega.com/alfabetajuega/2022/08/boku-no-hero-academia.jpeg",
        categoria: "Combate",
        duracion: "4 meses",
        precio: "₡85.000"
    },
    {
        nombre: "Curso de Estudios Generales",
        descripcion: "Para estudiantes de bachillerato regular, con opción de transferencia.",
        imagen: "https://areajugones.sport.es/wp-content/uploads/2024/08/my-hero-academia-ua-1.jpg",
        categoria: "General",
        duracion: "3 meses",
        precio: "₡60.000"
    },
    {
        nombre: "Curso de Apoyo",
        descripcion: "Diseñado para inventores que construyen trajes y artefactos de soporte.",
        imagen: "https://www.cultture.com/pics/2021/06/10-veces-que-my-hero-academia-hizo-que-la-escuela-pareciera-divertida-6.jpg",
        categoria: "Apoyo",
        duracion: "5 meses",
        precio: "₡95.000"
    },
    {
        nombre: "Curso de Gestión",
        descripcion: "Orientado a relaciones públicas, marketing y gestión de agencias.",
        imagen: "https://static.anime21.blog.br/2017/04/3-TURMA-DE-NEGOCIOS-1200x675-cropped.png",
        categoria: "Gestión",
        duracion: "2 meses",
        precio: "₡55.000"
    },
    {
        nombre: "Curso de Rescate",
        descripcion: "Técnicas de evacuación, primeros auxilios y protección ciudadana.",
        imagen: "https://images7.alphacoders.com/110/1107203.jpg",
        categoria: "Combate",
        duracion: "3 meses",
        precio: "₡70.000"
    },
    {
        nombre: "Estrategia Heroica",
        descripcion: "Análisis de riesgos, toma de decisiones y trabajo en equipo.",
        imagen: "https://static1.cbrimages.com/wordpress/wp-content/uploads/2020/04/My-Hero-Academia-UA-Students.jpg",
        categoria: "Combate",
        duracion: "4 meses",
        precio: "₡80.000"
    }
];

let categoriaActual = "Todos";

// Crea una tarjeta de curso
function createCourseCard(course) {
    const article = document.createElement("article");
    article.className = "course-card";

    const img = document.createElement("img");
    img.src = course.imagen;
    img.alt = course.nombre;

    const h3 = document.createElement("h3");
    h3.textContent = course.nombre;

    const categoria = document.createElement("p");
    categoria.innerHTML = `<strong>Categoría:</strong> ${course.categoria}`;

    const duracion = document.createElement("p");
    duracion.innerHTML = `<strong>Duración:</strong> ${course.duracion}`;

    const precio = document.createElement("p");
    precio.innerHTML = `<strong>Precio:</strong> ${course.precio}`;

    const p = document.createElement("p");
    p.textContent = course.descripcion;

    const link = document.createElement("a");
    link.className = "button";
    link.href = "#";
    link.textContent = "Ver más";

    article.appendChild(img);
    article.appendChild(h3);
    article.appendChild(categoria);
    article.appendChild(duracion);
    article.appendChild(precio);
    article.appendChild(p);
    article.appendChild(link);

    return article;
}

// Renderiza los cursos filtrados
function renderCourses(listaCursos) {
    const container = document.getElementById("coursesContainer");

    if (!container) {
        console.error("Contenedor de cursos no encontrado");
        return;
    }

    container.innerHTML = "";

    if (listaCursos.length === 0) {
        container.innerHTML = "<p>No se encontraron cursos.</p>";
        return;
    }

    listaCursos.forEach(course => {
        const courseCard = createCourseCard(course);
        container.appendChild(courseCard);
    });
}

// Aplica búsqueda y categoría al mismo tiempo
function filterCourses() {
    const searchInput = document.getElementById("searchCourse");
    const searchText = searchInput.value.toLowerCase();

    const filteredCourses = courses.filter(course => {
        const matchSearch =
            course.nombre.toLowerCase().includes(searchText) ||
            course.descripcion.toLowerCase().includes(searchText);

        const matchCategory =
            categoriaActual === "Todos" || course.categoria === categoriaActual;

        return matchSearch && matchCategory;
    });

    renderCourses(filteredCourses);
}

// Inicializa eventos
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchCourse");
    const categoryButtons = document.querySelectorAll(".category-filter");

    renderCourses(courses);

    searchInput.addEventListener("input", filterCourses);

    categoryButtons.forEach(button => {
        button.addEventListener("click", function () {
            categoryButtons.forEach(btn => btn.classList.remove("active"));
            button.classList.add("active");

            categoriaActual = button.getAttribute("data-category");

            filterCourses();
        });
    });
})
    );