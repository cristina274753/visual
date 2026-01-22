<?php
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

$coche = new Coche("Volkswagen", "Passat", 2010);
echo "Total coches: ". $coche->getTotalCoches()."\n";


$coche2 = new Coche("Peugeout", "208", 2010);
echo "Total coches: ". $coche->getTotalCoches()."\n";
unset($coche2);
echo "Total coches: ". $coche->getTotalCoches()."\n";

Coche::getTotalCoches();