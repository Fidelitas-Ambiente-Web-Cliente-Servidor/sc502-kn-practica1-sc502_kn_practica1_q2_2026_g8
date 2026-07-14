<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'My Hero Academia') ?></title>

    <link rel="stylesheet" href="./css/style.css">
    <?php if (!empty($pageCss)): ?>
    <link rel="stylesheet" href="./css/<?= htmlspecialchars($pageCss) ?>">
    <?php endif; ?>
</head>

<body>

<header>
    <nav class="navbar container py-3">
        <a class="brand" href="index.html">
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/My_Hero_Academia_logo_in_Japan_20150106.png" alt="Logo de la academia">
            <span>My Hero Academia</span>
        </a>

        <ul class="nav-links">
            <li><a href="index.html"<?= ($activeNav ?? '') === 'inicio' ? ' class="active"' : '' ?>>Inicio</a></li>
            <li><a href="cursos.html"<?= ($activeNav ?? '') === 'cursos' ? ' class="active"' : '' ?>>Cursos</a></li>
            <li><a href="profesores.html"<?= ($activeNav ?? '') === 'profesores' ? ' class="active"' : '' ?>>Profesores</a></li>
            <li><a href="index.php?controller=contacto&action=index"<?= ($activeNav ?? '') === 'contacto' ? ' class="active"' : '' ?>>Contacto</a></li>
        </ul>
    </nav>
</header>

<main class="container py-4">
