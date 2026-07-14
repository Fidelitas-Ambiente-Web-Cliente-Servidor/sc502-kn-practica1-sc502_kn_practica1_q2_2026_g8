-- Crear y seleccionar la base de datos
CREATE DATABASE IF NOT EXISTS appdb
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE appdb;

-- ────────────────────────────────────────────────────────
--  Tabla: contacto (Estudiante 4 - Rol4)
-- ────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS contacto (
  id         INT           NOT NULL AUTO_INCREMENT,
  nombre     VARCHAR(100)  NOT NULL,
  correo     VARCHAR(150)  NOT NULL,
  telefono   VARCHAR(20)   NOT NULL,
  asunto     VARCHAR(150)  NOT NULL,
  mensaje    TEXT          NOT NULL,
  created_at TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--------------------------------------------------------
-- Tabla:Cursos Estudiante2
--------------------------------------------------------
CREATE TABLE IF NOT EXISTS cursos (
  id          INT            NOT NULL AUTO_INCREMENT,
  nombre      VARCHAR(120)   NOT NULL,
  descripcion VARCHAR(500)   NOT NULL,
  imagen      VARCHAR(500)   NOT NULL,
  categoria   VARCHAR(50)    NOT NULL,
  duracion    VARCHAR(50)    NOT NULL,
  precio      DECIMAL(10,2)  NOT NULL,
  created_at  TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO contacto (nombre, correo, telefono, asunto, mensaje) VALUES
  ('Izuku Midoriya',  'deku@ua.edu',        '88881234', 'Información sobre cursos',      'Quisiera saber más sobre el curso de héroes y los requisitos de admisión para el próximo semestre.'),
  ('Ochaco Uraraka',  'uraraka@ua.edu',     '88882345', 'Consulta de matrícula',         'Necesito ayuda con el proceso de matrícula, no encuentro el formulario en el sitio web.'),
  ('Shoto Todoroki',  'todoroki@ua.edu',    '88883456', 'Cambio de clase',               'Deseo solicitar un cambio de la clase 1-B a la clase 1-A para el siguiente periodo académico.'),
  ('Tsuyu Asui',      'asui@ua.edu',        '88884567', 'Horario de tutorías',           'Podrían indicarme el horario disponible de tutorías para el curso de rescate acuático.'),
  ('Katsuki Bakugo',  'bakugo@ua.edu',      '88885678', 'Reclamo sobre calificación',     'Quiero solicitar una revisión de mi calificación en el último examen práctico de combate.');


INSERT INTO cursos
(nombre, descripcion, imagen, categoria, duracion, precio)
VALUES
(
    'Curso de Héroes',
    'Enfocado en el combate, rescate y desarrollo de dones.',
    'https://cdn.alfabetajuega.com/alfabetajuega/2022/08/boku-no-hero-academia.jpeg',
    'Combate',
    '4 meses',
    85000.00
),
(
    'Curso de Estudios Generales',
    'Para estudiantes de bachillerato regular, con opción de transferencia.',
    'https://areajugones.sport.es/wp-content/uploads/2024/08/my-hero-academia-ua-1.jpg',
    'General',
    '3 meses',
    60000.00
),
(
    'Curso de Apoyo',
    'Diseñado para inventores que construyen trajes y artefactos de soporte.',
    'https://www.cultture.com/pics/2021/06/10-veces-que-my-hero-academia-hizo-que-la-escuela-pareciera-divertida-6.jpg',
    'Apoyo',
    '5 meses',
    95000.00
),
(
    'Curso de Gestión',
    'Orientado a relaciones públicas, marketing y gestión de agencias.',
    'https://static.anime21.blog.br/2017/04/3-TURMA-DE-NEGOCIOS-1200x675-cropped.png',
    'Gestión',
    '2 meses',
    55000.00
),
(
    'Curso de Rescate',
    'Técnicas de evacuación, primeros auxilios y protección ciudadana.',
    'https://images7.alphacoders.com/110/1107203.jpg',
    'Combate',
    '3 meses',
    70000.00
),
(
    'Estrategia Heroica',
    'Análisis de riesgos, toma de decisiones y trabajo en equipo.',
    'https://static1.cbrimages.com/wordpress/wp-content/uploads/2020/04/My-Hero-Academia-UA-Students.jpg',
    'Combate',
    '4 meses',
    80000.00
);
-- ────────────────────────────────────────────────────────
--  Resto de tablas (index, cursos, profesores) las agrega
--  cada compañero según su rol al migrar su página.
-- ────────────────────────────────────────────────────────
