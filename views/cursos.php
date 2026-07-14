<?php

$pageTitle = 'Cursos | My Hero Academia';
$pageCss = 'cursos.css';
$pageScript = '';
$activeNav = 'cursos';

/*
|--------------------------------------------------------------------------
| Variables recibidas desde CursosController
|--------------------------------------------------------------------------
| Estos valores predeterminados evitan errores si Intelephense analiza
| la vista sin reconocer que las variables se crean en el controlador.
*/

$cursos = $cursos ?? [];
$categoriasPermitidas = $categoriasPermitidas ?? [];
$categoriaSeleccionada = $categoriaSeleccionada ?? '';

require __DIR__ . '/layout/header.php';

?>

<section class="hero-cursos">

    <div class="container">

        <h1>Catálogo de Cursos</h1>

        <p>
            Explora todos los cursos disponibles en la academia
            y filtra por categoría.
        </p>

    </div>

</section>

<section class="course-cards container">

    <div
        class="d-flex justify-content-between align-items-center
               flex-wrap gap-3 mb-4"
    >

        <div>

            <h2>Cursos disponibles</h2>

            <p>
                Se encontraron

                <strong>
                    <?= count($cursos) ?>
                </strong>

                curso<?= count($cursos) !== 1 ? 's' : '' ?>.
            </p>

        </div>

        <form
            action="index.php"
            method="GET"
            class="d-flex gap-2 align-items-end flex-wrap"
        >

            <input
                type="hidden"
                name="controller"
                value="cursos"
            >

            <input
                type="hidden"
                name="action"
                value="index"
            >

            <div>

                <label
                    for="categoria"
                    class="form-label"
                >
                    Categoría
                </label>

                <select
                    id="categoria"
                    name="categoria"
                    class="form-select"
                >

                    <option value="">
                        Todas las categorías
                    </option>

                    <?php foreach ($categoriasPermitidas as $categoria): ?>

                        <option
                            value="<?= htmlspecialchars(
                                $categoria,
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>"

                            <?= $categoriaSeleccionada === $categoria
                                ? 'selected'
                                : '' ?>
                        >

                            <?= htmlspecialchars(
                                $categoria,
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <button
                class="btn btn-primary"
                type="submit"
            >
                Filtrar
            </button>

            <?php if ($categoriaSeleccionada !== ''): ?>

                <a
                    href="index.php?controller=cursos&action=index"
                    class="btn btn-secondary"
                >
                    Limpiar
                </a>

            <?php endif; ?>

        </form>

    </div>

    <?php if (empty($cursos)): ?>

        <div class="alert alert-warning">

            <h4>No se encontraron cursos</h4>

            <p class="mb-0">
                No existen cursos para la categoría seleccionada.
            </p>

        </div>

    <?php else: ?>

        <div class="row">

            <?php foreach ($cursos as $curso): ?>

                <div class="col-lg-4 col-md-6 mb-4">

                    <article class="card h-100 shadow-sm">

                        <img
                            src="<?= htmlspecialchars(
                                $curso['imagen'] ?? '',
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>"
                            class="card-img-top"
                            alt="<?= htmlspecialchars(
                                $curso['nombre'] ?? 'Curso',
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>"
                        >

                        <div class="card-body">

                            <span class="badge bg-primary mb-2">

                                <?= htmlspecialchars(
                                    $curso['categoria'] ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>

                            </span>

                            <h3 class="card-title h5">

                                <?= htmlspecialchars(
                                    $curso['nombre'] ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>

                            </h3>

                            <p class="card-text">

                                <?= htmlspecialchars(
                                    $curso['descripcion'] ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>

                            </p>

                            <p>

                                <strong>Duración:</strong>

                                <?= htmlspecialchars(
                                    $curso['duracion'] ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>

                            </p>

                            <p>

                                <strong>Precio:</strong>

                                ₡<?= number_format(
                                    (float) ($curso['precio'] ?? 0),
                                    0,
                                    ',',
                                    '.'
                                ) ?>

                            </p>

                        </div>

                    </article>

                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</section>

<?php require __DIR__ . '/layout/footer.php'; ?>