<?php


// Ruta principal

use Cristina\App\controllers\IncidenciaController;
use Cristina\App\controllers\LoginController;
use Cristina\Lib\Route;

// Rutas POST
/*Route::post("/login", function () {
    $user = $_POST['user'] ?? '';
    echo "Hola página de login POST. Usuario: " . htmlspecialchars($user);
});*/

// Rutas con controladores
// Route::get("/inicio", [HomeController::class, 'index']);



//login
Route::get("/login", [LoginController::class, 'index']);
Route::post("/login", [LoginController::class, 'verificar']);

//indice
Route::get("/", [IncidenciaController::class, 'index']);
Route::get("/index", [IncidenciaController::class, 'index']);
Route::post("/index", [IncidenciaController::class, 'verificar']);

//borrar
//Route::get("eliminar", [IncidenciaController::class, 'borrar']); //TODO no funciona porque la url pone el id tambien
Route::get("/eliminar/{id}", [IncidenciaController::class, 'borrar']);

//modificar
Route::get("/modificar/{id}", [IncidenciaController::class, 'modificar']);

//alta
Route::get("/alta", [IncidenciaController::class, 'alta']);
Route::post("/alta", [IncidenciaController::class, 'alta_verificar']);

//salir
Route::get("/logout", [IncidenciaController::class, 'logout']);



 Route::handleRoute();