<?php
    //meter namespace

    class Route{
        private static array $routes=[];

        public static function get(string $uri, $callback){
            self::$routes['GET'][$uri]=$callback;
        }
        public static function post(string $uri, $callback){
            self::$routes['POST'][$uri]=$callback;
        }
        public static function getAll(){
            return self::$routes;
        }
    }

    Route::get("/","Bienvenido a la página de inicio");
    Route::get("/login","Página de LOGIN");
    Route::post("/login","Página de LOGIN - Validación");
    
    echo "<pre>";
    print_r(Route::getAll());
    echo "</pre>";
?>