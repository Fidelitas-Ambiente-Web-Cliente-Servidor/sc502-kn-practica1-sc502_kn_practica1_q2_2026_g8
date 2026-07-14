<?php

require_once __DIR__ . '/../models/ContactoModel.php';

class ContactoController
{
    private $model;

    public function __construct()
    {
        $this->model = new ContactoModel();
    }

    // Se ejecuta con GET ?controller=contacto&action=index
    // Muestra el formulario de contacto vacio
    public function index()
    {
        $sent = isset($_GET['sent']);
        $errores = array();
        $viejo = array();
        require __DIR__ . '/../views/contacto.php';
    }

    // Se ejecuta con POST ?controller=contacto&action=store
    // Valida los datos que llegan del formulario y los guarda en la BD
    public function store()
    {
        // Recogemos y limpiamos los campos que vienen del formulario
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $asunto = trim($_POST['asunto']);
        $mensaje = trim($_POST['mensaje']);

        // Guardamos lo que escribio el usuario por si hay que volver a mostrar el formulario
        $viejo = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'telefono' => $telefono,
            'asunto' => $asunto,
            'mensaje' => $mensaje,
        );

        // Validamos igual que en contacto.js, pero ahora del lado del servidor
        $errores = array();

        if (!$this->validarNombre($nombre)) {
            $errores['nombre'] = 'El nombre debe tener al menos 5 letras y solo puede contener letras y espacios.';
        }
        if (!$this->validarCorreo($correo)) {
            $errores['correo'] = 'Ingresa un correo electrónico válido.';
        }
        if (!$this->validarTelefono($telefono)) {
            $errores['telefono'] = 'El teléfono debe tener al menos 8 dígitos y solo números.';
        }
        if (!$this->validarAsunto($asunto)) {
            $errores['asunto'] = 'El asunto debe tener al menos 3 caracteres.';
        }
        if (!$this->validarMensaje($mensaje)) {
            $errores['mensaje'] = 'El mensaje debe tener al menos 20 caracteres.';
        }

        // Si algo esta mal, volvemos a mostrar el formulario con los errores
        if (count($errores) > 0) {
            $sent = false;
            require __DIR__ . '/../views/contacto.php';
            return;
        }

        // Todo bien, guardamos en la base de datos con el Modelo
        $this->model->create($viejo);

        // Redirigimos para evitar que al recargar la pagina se envie el formulario otra vez
        header('Location: index.php?controller=contacto&action=index&sent=1');
        exit;
    }

    // Las siguientes funciones son las mismas validaciones de js/contacto.js
    // pero escritas en PHP para que tambien se revisen en el servidor

    private function validarNombre($valor)
    {
        return preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{5,}$/', $valor) === 1;
    }

    private function validarCorreo($valor)
    {
        return preg_match('/^[\w.+-]+@[\w-]+\.[A-Za-z]{2,}$/', $valor) === 1;
    }

    private function validarTelefono($valor)
    {
        return preg_match('/^\d{8,}$/', $valor) === 1;
    }

    private function validarAsunto($valor)
    {
        return strlen($valor) >= 3;
    }

    private function validarMensaje($valor)
    {
        return strlen($valor) >= 20;
    }
}
