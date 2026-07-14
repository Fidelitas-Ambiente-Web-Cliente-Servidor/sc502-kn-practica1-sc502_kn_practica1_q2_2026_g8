<?php

require_once __DIR__ . '/../models/CursosModel.php';

class CursosController
{
    private CursosModel $model;

    public function __construct()
    {
        $this->model = new CursosModel();
    }

    public function index(): void
    {
        // Categorías permitidas para el filtro.
        $categoriasPermitidas = [
            'Combate',
            'General',
            'Apoyo',
            'Gestión',
            'Rescate'
        ];

        // Recibe la categoría enviada por GET.
        $categoriaSeleccionada = trim(
            $_GET['categoria'] ?? ''
        );

        // Si la categoría es válida, filtra los cursos.
        if (
            $categoriaSeleccionada !== '' &&
            in_array(
                $categoriaSeleccionada,
                $categoriasPermitidas,
                true
            )
        ) {
            $cursos = $this->model->getByCategory(
                $categoriaSeleccionada
            );
        } else {
            // Si no hay categoría o no es válida,
            // muestra todos los cursos.
            $categoriaSeleccionada = '';
            $cursos = $this->model->getAll();
        }

        // Carga la vista con las variables anteriores.
        require __DIR__ . '/../views/cursos.php';
    }
}