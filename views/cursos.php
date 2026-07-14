<?php

$pageTitle = 'Cursos | My Hero Academia';
$pageCss = 'cursos.css';
$pageScript = '';
$activeNav = 'cursos';

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

    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div>

            <h2>Cursos Disponibles</h2>

            <p>

                Se encontraron

                <strong>

                    <?= count($cursos) ?>

                </strong>

                curso<?= count($cursos) != 1 ? 's' : '' ?>.

            </p>

        </div>

        <form
            action="index.php"
            method="GET"
            class="d-flex gap-2 align-items-center"
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

            <select
                name="categoria"
                class="form-select"
            >

                <option value="">
                    Todas las categorías
                </option>

                <?php foreach ($categoriasPermitidas as $categoria): ?>

                    <option
                        value="<?= htmlspecialchars($categoria) ?>"

                        <?= ($categoriaSeleccionada == $categoria)
                            ? 'selected'
                            : '' ?>

                    >

                        <?= htmlspecialchars($categoria) ?>

                    </option>

                <?php endforeach; ?>

            </select>

            <button
                class="btn btn-primary"
                type="submit"
            >

                Filtrar

            </button>

            <?php if ($categoriaSeleccionada != ''): ?>

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

            <h4>

                No existen cursos para esa categoría.

            </h4>

        </div>

    <?php else: ?>

        <div class="row">

            <?php foreach ($cursos as $curso): ?>

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card h-100 shadow-sm">

                        <img
                            src="<?= htmlspecialchars($curso['imagen']) ?>"
                            class="card-img-top"
                            alt="<?= htmlspecialchars($curso['nombre']) ?>"
                        >

                        <div class="card-body">

                            <span class="badge bg-primary mb-2">

                                <?= htmlspecialchars($curso['categoria']) ?>

                            </span>

                            <h5 class="card-title">

                                <?= htmlspecialchars($curso['nombre']) ?>

                            </h5>

                            <p class="card-text">

                                <?= htmlspecialchars($curso['descripcion']) ?>

                            </p>

                            <p>

                                <strong>

                                    Duración:

                                </strong>

                                <?= htmlspecialchars($curso['duracion']) ?>

                            </p>

                            <p>

                                <strong>

                                    Precio:

                                </strong>

                                ₡<?= number_format($curso['precio'],0,',','.') ?>

                            </p>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</section>

<?php

require __DIR__ . '/layout/footer.php';

?>