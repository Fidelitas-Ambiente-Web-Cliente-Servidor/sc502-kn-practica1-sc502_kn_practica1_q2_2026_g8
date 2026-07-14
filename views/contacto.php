<?php
$pageTitle  = 'Contacto | My Hero Academia';
$pageCss    = 'contacto.css';
$pageScript = 'contacto.js';
$activeNav  = 'contacto';
require __DIR__ . '/layout/header.php';
?>

    <section class="hero-contacto">
        <h1>Contáctanos</h1>
        <p>
            ¿Tienes dudas sobre nuestros cursos o quieres unirte a la academia?
            Escríbenos y un héroe profesional te responderá a la brevedad.
        </p>
    </section>

    <section class="contacto-grid">

        <div class="contacto-form-card">
            <h2>Envíanos un mensaje</h2>

            <?php if (!empty($sent)): ?>
                <p class="success-message visible">¡Tu mensaje fue enviado con éxito! Te contactaremos pronto.</p>
            <?php endif; ?>

            <form method="POST" action="index.php?controller=contacto&action=store">
                <div class="form-group">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Izuku Midoriya"
                           value="<?= htmlspecialchars($viejo['nombre'] ?? '') ?>">
                    <span class="error-message" id="error-nombre"><?= htmlspecialchars($errores['nombre'] ?? '') ?></span>
                </div>

                <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="correo@ua.edu"
                           value="<?= htmlspecialchars($viejo['correo'] ?? '') ?>">
                    <span class="error-message" id="error-correo"><?= htmlspecialchars($errores['correo'] ?? '') ?></span>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="8888-8888"
                           value="<?= htmlspecialchars($viejo['telefono'] ?? '') ?>">
                    <span class="error-message" id="error-telefono"><?= htmlspecialchars($errores['telefono'] ?? '') ?></span>
                </div>

                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input type="text" id="asunto" name="asunto" placeholder="Información sobre cursos"
                           value="<?= htmlspecialchars($viejo['asunto'] ?? '') ?>">
                    <span class="error-message" id="error-asunto"><?= htmlspecialchars($errores['asunto'] ?? '') ?></span>
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..."><?= htmlspecialchars($viejo['mensaje'] ?? '') ?></textarea>
                    <span class="error-message" id="error-mensaje"><?= htmlspecialchars($errores['mensaje'] ?? '') ?></span>
                </div>

                <button type="submit" class="button" id="btnEnviar" disabled>Enviar mensaje</button>

                <p class="success-message" id="successMessage"></p>
            </form>
        </div>

        <div class="contacto-info-card">
            <h2>Información de contacto</h2>

            <p>
                <strong>Dirección:</strong><br>
                Avenida Héroes 350, Ciudad Musutafu
            </p>

            <p>
                <strong>Teléfono:</strong><br>
                +506 2222-3333
            </p>

            <p>
                <strong>Correo:</strong><br>
                contacto@myheroacademia.edu
            </p>
        </div>

    </section>

    <section class="mapa-section">
        <h2>Cómo llegar</h2>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.5391731073!2d-84.0907514!3d9.9325427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e0b0!2sSan+Jose!5e0!3m2!1ses!2scr!4v1700000000000"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>

<?php require __DIR__ . '/layout/footer.php'; ?>
