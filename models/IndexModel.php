<?php

require_once __DIR__ . '/../config/database.php';

class IndexModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT nombre, descripcion, imagen, categoria
             FROM cursos_destacados
             ORDER BY id'
        );

        return $stmt->fetchAll();
    }
}
