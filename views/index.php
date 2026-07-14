<?php
require __DIR__ . '/layout/header.php';
?>

<section class="hero">
    <h1>My hero Academia</h1>
    <p>Bienvenidos Heroes</p>
    <p class="hero-note">¡Ve más allá, PLUS ULTRA!</p>
    <div class="hero-actions">
        <a class="button" href="#">PLUS ULTRA!</a>
    </div>
</section>

<section class="course-cards">
    <h2>Nuestros cursos</h2>
    <div class="cards-grid">
        <?php if (!empty($cursos)): ?>
            <?php foreach ($cursos as $curso): ?>
                <article class="course-card">
                    <img src="<?= htmlspecialchars($curso['imagen']) ?>" alt="<?= htmlspecialchars($curso['nombre']) ?>">
                    <h3><?= htmlspecialchars($curso['nombre']) ?></h3>
                    <p><?= htmlspecialchars($curso['descripcion']) ?></p>
                    <a class="button" href="#">Ver más</a>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay cursos destacados disponibles por el momento.</p>
        <?php endif; ?>
    </div>
</section>

<section class="stats-section">
    <h2>Estadísticas de la academia</h2>
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-value">1,250</div>
            <div class="stat-label">Estudiantes inscritos</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">48</div>
            <div class="stat-label">Profesores activos</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">4</div>
            <div class="stat-label">Cursos disponibles</div>
        </div>
    </div>
</section>

<section class="testimonial-section">
    <h2>Testimonios de estudiantes</h2>
    <div class="testimonial-grid">
        <article class="testimonial-card">
            <img src="https://anibase.net/files/cd613c92d63c264ac5e5c12de93997d9" alt="Tsuyu Asui">
            <div class="testimonial-content">
                <h3>Tsuyu Asui</h3>
                <p>"La academia me ayudó a mejorar mis habilidades y a sentirme más segura en cada misión. El ambiente de aprendizaje es increíble."</p>
            </div>
        </article>
        <article class="testimonial-card">
            <img src="https://upload.wikimedia.org/wikipedia/it/2/26/Shoto_Todoroki.jpg" alt="Shoto Todoroki">
            <div class="testimonial-content">
                <h3>Shoto Todoroki</h3>
                <p>"Aquí encontré un lugar donde puedo desarrollarme como héroe y también aprender de mis compañeros. Los profesores son muy exigentes y justos."</p>
            </div>
        </article>
    </div>
</section>

<?php require __DIR__ . '/layout/footer.php'; ?>
