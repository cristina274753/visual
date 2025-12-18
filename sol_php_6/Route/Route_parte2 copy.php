<?php
    //meter namespace

    class Route{
        private static array $routes=[];

        public static function get(string $uri, callable $callback){
            self::$routes['GET'][$uri]=$callback;
        }
        public static function post(string $uri, callable $callback){
            self::$routes['POST'][$uri]=$callback;
        }
        public static function getAll(){
            return self::$routes;
        }
        public static function handleRoute(){
            $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
            $uri = $_SERVER['REQUEST_URI'] ?? '/'; 
            
             
            //comprobar en mi array si existe un elemento 
            // con ese método y esa uri
            if (isset(self::$routes[$method][$uri])){
                call_user_func(self::$routes[$method][$uri]);
            }else
                echo "La ruta no existe-> 404 ERROR";

        }
    }

    Route::get("/", function(){
            echo "Bienvenido a la página de inicio";
        });
    Route::get("/login", function(){
            echo "Página de LOGIN";
        });
    Route::post("/login", function(){
            echo "Página de LOGIN - validación POST";
        });
    
        $_SERVER['REQUEST_URI']='/login';
        $_SERVER['REQUEST_METHOD']='POST';
        Route::handleRoute();
        
    // echo "<pre>";
    // print_r(Route::getAll());
    // echo "</pre>";
?>