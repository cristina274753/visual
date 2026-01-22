<?php
//meter namespace

class Route
{
    private static array $routes = [];

    public static function get(string $uri, callable $callback)
    {
        self::$routes['GET'][$uri] = $callback;
    }
    public static function post(string $uri, callable $callback)
    {
        self::$routes['POST'][$uri] = $callback;
    }
    public static function getAll()
    {
        return self::$routes;
    }
    public static function handleRoute()
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri_full = $_SERVER['REQUEST_URI'] ?? '/'; // 'HTTP_REFERER', 'DOCUMENT_ROOT', CONTEXT_DOCUMENTO_ROOT

        
        if (str_starts_with($uri_full, \APP_ROOT)) {
            $uri = substr($uri_full, strlen(\APP_ROOT));
        } else {
            $uri = $uri_full;
        }
        // Opcional: eliminar parámetros de consulta (ej: /login?id=1 -> /login)
        $uri = strtok($uri, '?');

        //comprobar en mi array si existe un elemento 
        // con ese método y esa uri
        if (isset(self::$routes[$method][$uri])) {
            call_user_func(self::$routes[$method][$uri]);
        } else
            echo "La ruta no existe-> 404 ERROR";
    }
}
define('APP_ROOT', '/php/php_6/Route');

Route::get("/", function () {
    echo "Bienvenido a la página de inicio";
});
Route::get("/login", function () {
    echo "Página de LOGIN";
});
Route::post("/login", function () {
    echo "Página de LOGIN - validación POST";
});
Route::get("/alta", function () {
    echo "Página de Altas";
});

$_SERVER['REQUEST_URI'] = \APP_ROOT . '/login';
$_SERVER['REQUEST_METHOD'] = 'POST';
Route::handleRoute();

echo "<br>";

$_SERVER['REQUEST_URI'] = \APP_ROOT . '/alta?id=3';
$_SERVER['REQUEST_METHOD'] = 'GET';
Route::handleRoute();


// echo "<pre>";
// print_r(Route::getAll());
// echo "</pre>";
