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

//salir
Route::get("/salir", [LogisticaController::class, "logout"]);

Route::get("/zodiaco", [LogisticaController::class, "zodiaco"]);

Route::get("/comparativa1", [LogisticaController::class, "comparativa1"]);

Route::get("/comparativa2", [LogisticaController::class, "comparativa2"]);
//Route::get("/comparativa/{s1}/{s2}", [LogisticaController::class, "comparativa2"]);


Route::get("/comparativa3", [LogisticaController::class, "comparativa3"]);
Route::post("/comparativa3", [LogisticaController::class, "guardar"]);


//borrar
//Route::get("eliminar", [IncidenciaController::class, 'borrar']); //TODO no funciona porque la url pone el id tambien
Route::get("/eliminar/{id}", [LogisticaController::class, 'borrar']);

//modificar
Route::get("/modificar/{id}", [LogisticaController::class, 'modificar']);

//alta
Route::get("/alta", [LogisticaController::class, 'alta']);
Route::post("/alta", [LogisticaController::class, 'alta_verificar']);

//salir
Route::get("/logout", [LogisticaController::class, 'logout']);



 Route::handleRoute();