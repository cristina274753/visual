<?php


// Ruta principal

use Cristina\App\controllers\LogisticaController;
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
Route::get("/", [LogisticaController::class, 'index']);
Route::get("/index", [LogisticaController::class, 'index']);
Route::post("/index", [LogisticaController::class, 'verificar']);

Route::get("/carga", [LogisticaController::class, 'carga']);

Route::post("/calcular-carga", [LogisticaController::class, 'calcularCarga']);

Route::post("/confirmarEnvio", [LogisticaController::class, 'confirmarEnvio']);



//salir
Route::get("/salir", [LogisticaController::class, "logout"]);

//salir
Route::get("/logout", [LogisticaController::class, 'logout']);


 Route::handleRoute();