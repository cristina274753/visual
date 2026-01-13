<?php

namespace cristina\app\controllers;

class Controller
{
    // Método común para cargar vistas
    protected function view(string $vista, array $datos = []): void
    {
// Convertimos el array en variables
        extract($datos);

        // Cargamos la vista

        require __DIR__ . "/../views/$vista.php";
    }
}

