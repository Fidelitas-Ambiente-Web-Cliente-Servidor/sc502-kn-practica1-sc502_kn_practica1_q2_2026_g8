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

INSERT INTO contacto (nombre, correo, telefono, asunto, mensaje) VALUES
  ('Izuku Midoriya',  'deku@ua.edu',        '88881234', 'Información sobre cursos',      'Quisiera saber más sobre el curso de héroes y los requisitos de admisión para el próximo semestre.'),
  ('Ochaco Uraraka',  'uraraka@ua.edu',     '88882345', 'Consulta de matrícula',         'Necesito ayuda con el proceso de matrícula, no encuentro el formulario en el sitio web.'),
  ('Shoto Todoroki',  'todoroki@ua.edu',    '88883456', 'Cambio de clase',               'Deseo solicitar un cambio de la clase 1-B a la clase 1-A para el siguiente periodo académico.'),
  ('Tsuyu Asui',      'asui@ua.edu',        '88884567', 'Horario de tutorías',           'Podrían indicarme el horario disponible de tutorías para el curso de rescate acuático.'),
  ('Katsuki Bakugo',  'bakugo@ua.edu',      '88885678', 'Reclamo sobre calificación',     'Quiero solicitar una revisión de mi calificación en el último examen práctico de combate.');

-- ────────────────────────────────────────────────────────
--  Tabla: cursos_destacados (Estudiante 1 - Inicio)
-- ────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS cursos_destacados (
  id          INT           NOT NULL AUTO_INCREMENT,
  nombre      VARCHAR(100)  NOT NULL,
  descripcion VARCHAR(255)  NOT NULL,
  imagen      VARCHAR(255)  NOT NULL,
  categoria   VARCHAR(50)   NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cursos_destacados (nombre, descripcion, imagen, categoria) VALUES
  ('Curso de Héroes', 'Enfocado en el combate, rescate y desarrollo de dones (Clases 1-A y 1-B).', 'https://cdn.alfabetajuega.com/alfabetajuega/2022/08/boku-no-hero-academia.jpeg', 'Combate'),
  ('Curso de Estudios Generales', 'Para estudiantes de bachillerato regular, con opción de transferencia por buen rendimiento (Clases C a E).', 'https://areajugones.sport.es/wp-content/uploads/2024/08/my-hero-academia-ua-1.jpg', 'General'),
  ('Curso de Apoyo', 'Diseñado para inventores y genios que construyen los trajes y artefactos de soporte.', 'https://www.cultture.com/pics/2021/06/10-veces-que-my-hero-academia-hizo-que-la-escuela-pareciera-divertida-6.jpg', 'Apoyo'),
  ('Curso de Gestión', 'Orientado a las relaciones públicas, marketing y gestión de agencias de héroes.', 'https://static.anime21.blog.br/2017/04/3-TURMA-DE-NEGOCIOS-1200x675-cropped.png', 'Gestión');

-- ────────────────────────────────────────────────────────
--  Resto de tablas (cursos, profesores) las agrega
--  cada compañero según su rol al migrar su página.
-- ────────────────────────────────────────────────────────
