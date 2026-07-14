<?php

require_once __DIR__ . '/../models/IndexModel.php';

class IndexController
{
    private IndexModel $model;

    public function __construct()
    {
        $this->model = new IndexModel();
    }

    public function index(): void
    {
        $cursos = $this->model->getAll();

        $pageTitle  = 'Inicio | My Hero Academia';
        $pageCss    = 'index.css';
        $pageScript = '';
        $activeNav  = 'inicio';

        require __DIR__ . '/../views/index.php';
    }
}
