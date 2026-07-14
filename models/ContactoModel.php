<?php

require_once __DIR__ . '/../config/database.php';

class ContactoModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    // ────────────────────────────────────────────────────────
    //  CREATE — Guardar un nuevo mensaje de contacto
    // ────────────────────────────────────────────────────────
    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO contacto (nombre, correo, telefono, asunto, mensaje)
             VALUES (:nombre, :correo, :telefono, :asunto, :mensaje)'
        );

        return $stmt->execute([
            ':nombre'   => $data['nombre'],
            ':correo'   => $data['correo'],
            ':telefono' => $data['telefono'],
            ':asunto'   => $data['asunto'],
            ':mensaje'  => $data['mensaje'],
        ]);
    }
}
