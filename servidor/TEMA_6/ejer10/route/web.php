<?php

use enrutador\app\controllers\HomeController;
use enrutador\lib\Route;

//registramos todas las rutas posibles
Route::get("/", function () {
    echo "hola desde la raíz";
});

// ponemos el id con {} por que es un parametro
Route::get("/producto/{id}", function ($id) {
    echo "Detalles del producto: $id";
});

Route::get("/pepe", function () {
    echo "hola PEPE";
});
Route::post("/login", function () {
    echo "hola página de login POST";
    $user = $_POST['user']??'';
});
//añadimos un controlador como función anónima.
Route::get("/inicio", [HomeController::class,'index']);

Route::handleRoute();





?>