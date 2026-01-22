<?php

use cristina\lib\Route;
use cristina\app\controllers\HomeController;
use cristina\app\controllers\PersonalController;

// Ruta principal
Route::get("/", function () {
    require __DIR__ . "/../app/views/index_vista.php";
});

// Rutas con parámetros
Route::get("/producto/{id}", function ($id) {
    echo "Detalles del producto: $id";
});

// Rutas simples
Route::get("/pepe", function () {
    echo "Hola PEPE";
});

// Rutas POST
Route::post("/login", function () {
    $user = $_POST['user'] ?? '';
    echo "Hola página de login POST. Usuario: " . htmlspecialchars($user);
});

// Rutas con controladores
Route::get("/inicio", [HomeController::class, 'index']);
Route::get("/personal", [PersonalController::class, 'index']);




 Route::handleRoute();