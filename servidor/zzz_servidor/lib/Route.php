<?php

namespace Cristina\Lib;

class Route
{
    // Array que almacena las rutas
    private static array $routes = [];

    // Rutas GET
    public static function get(string $uri, $callback): void
    {
        self::$routes['GET'][$uri] = $callback;
    }

    // Rutas POST
    public static function post(string $uri, $callback): void
    {
        self::$routes['POST'][$uri] = $callback;
    }

    // Procesar la ruta actual
    public static function handleRoute(): void
    {
        // Script base
        $script_name = $_SERVER['SCRIPT_NAME'];
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        // Eliminar base path
        $base_ruta = str_replace('index.php', '', $script_name);

        if ($base_ruta !== '/') {
            $ruta = str_replace($base_ruta, '/', $uri);
        } else {
            $ruta = $uri;
        }

        // Quitar parámetros GET (?id=...)
        $ruta = parse_url($ruta, PHP_URL_PATH);

        // 1️⃣ Coincidencia exacta
        if (isset(self::$routes[$method][$ruta])) {
            self::execute(self::$routes[$method][$ruta]);
            return;
        }

        // 2️⃣ Coincidencia con parámetros {id}
        $ruta_parts = explode('/', trim($ruta, '/'));

        foreach (self::$routes[$method] ?? [] as $route => $handler) {

            $route_parts = explode('/', trim($route, '/'));

            if (count($route_parts) !== count($ruta_parts)) {
                continue;
            }

            $params = [];
            $match = true;

            for ($i = 0; $i < count($route_parts); $i++) {

                if (preg_match('/^\{(.+)\}$/', $route_parts[$i])) {
                    $params[] = $ruta_parts[$i];
                } elseif ($route_parts[$i] !== $ruta_parts[$i]) {
                    $match = false;
                    break;
                }
            }

            if ($match) {
                self::execute($handler, $params);
                return;
            }
        }

        // 404
        http_response_code(404);
        echo "<h1>404 - Ruta no encontrada: $ruta</h1>";
    }

    // Ejecutar handler (closure o controlador)
    private static function execute($handler, array $params = []): void
    {
        // Closure / función
        if (is_callable($handler)) {
            call_user_func_array($handler, $params);
            return;
        }

        // Controlador [Clase, método]
        if (is_array($handler)) {
            [$controller, $method] = $handler;

            $obj = new $controller();
            call_user_func_array([$obj, $method], $params);
            return;
        }

        throw new \Exception('Handler de ruta no válido');
    }
}
