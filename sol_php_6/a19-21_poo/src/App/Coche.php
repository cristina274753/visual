<?php
namespace PepeLluyot\App;

class Coche
{
    private static int $cantidadCoches = 0;

    //constructor
    public function __construct(
        private string $marca,
        private string $modelo,
        private int $anyo = 2021
    ) {
        self::$cantidadCoches++;
        echo "nuevo conche creado\n";
    }
    //método destructor
    public function __destruct()
    {
        self::$cantidadCoches--;
        echo "Coche destruido\n";
    }
    public static function getTotalCoches(){
        return self::$cantidadCoches;
    }
};
