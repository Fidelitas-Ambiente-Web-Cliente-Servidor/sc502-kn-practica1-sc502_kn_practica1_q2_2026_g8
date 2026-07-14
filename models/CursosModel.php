<?php

require_once __DIR__ . '/../config/database.php';

class CursosModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    // Obtiene todos los cursos registrados.
    public function getAll(): array
    {
        $sql = '
            SELECT
                id,
                nombre,
                descripcion,
                imagen,
                categoria,
                duracion,
                precio
            FROM cursos
            ORDER BY nombre ASC
        ';

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // Obtiene los cursos de la categoría recibida.
    public function getByCategory(string $cat): array
    {
        $sql = '
            SELECT
                id,
                nombre,
                descripcion,
                imagen,
                categoria,
                duracion,
                precio
            FROM cursos
            WHERE categoria = :categoria
            ORDER BY nombre ASC
        ';

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':categoria' => $cat
        ]);

        return $stmt->fetchAll();
    }
}