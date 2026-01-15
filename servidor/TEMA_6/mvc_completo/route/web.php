<?php


// Ruta principal

use Cristina\App\controllers\IncidenciaController;
use Cristina\App\controllers\LoginController;
use Cristina\Lib\Route;

Route::get("/", function () {
    require __DIR__ . "/../app/views/index_view.php";
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
/*Route::post("/login", function () {
    $user = $_POST['user'] ?? '';
    echo "Hola página de login POST. Usuario: " . htmlspecialchars($user);
});*/

// Rutas con controladores
// Route::get("/inicio", [HomeController::class, 'index']);



Route::get("/login", [LoginController::class, 'index']);
Route::post("/login", [LoginController::class, 'verificar']);

Route::get("/index", [IncidenciaController::class, 'index']);
Route::post("/index", [IncidenciaController::class, 'verificar']);

//Route::get("eliminar", [IncidenciaController::class, 'borrar']); //TODO no funciona porque la url pone el id tambien
Route::get("eliminar/{id}", [IncidenciaController::class, 'borrar']);

Route::get("modificar/{id}", [IncidenciaController::class, 'modificar']);


Route::get("alta", [IncidenciaController::class, 'alta']);



 Route::handleRoute();