<?php
class Coche
{
    // a partir de php 8.0
    // private string $marca = '';
    // private string $modelo = '';
    // private int $anyo;

    //constructor
    public function __construct(
            private string $marca, 
            private string $modelo, 
            private int $anyo = 2021)
    {
        // $this->marca = $marca;
        // $this->modelo = $modelo;
        // $this->anyo = $anyo;
    }
       //GETTER & SETTER
    public function __get($propiedad){
        if (property_exists($this, $propiedad)){
            return $this->$propiedad;
        }
    }
    public function __set($propiedad,$valor){
        if (property_exists($this, $propiedad)){
            $this->$propiedad = $valor;
        }
    }
    
    //mostrarmos la información del coche
    public function mostrarInfo()
    {
        //no se debe hacer
        echo "Marca: " . $this->marca . " - Modelo: " . $this->modelo . " - Año :" . $this->anyo . "\n";
    }
    //actualiza el eño de un coche
    public function actualizarAnyo(int $anyo)
    {
        $this->anyo = $anyo;
    }
};

$coche = new Coche("Volkswagen", "Passat", 2006);

//mostramos la marca con __GET
echo "Marca del coche1: ". $coche->marca."\n";

//las siguientes líneas de código son equivalentes pero se usa la 2a
$micoche->__set('marca', 'NuevaMarca');
$coche->marca = "NuevaMarca";

//mostramos la nueva marca con __GET
echo "Marca del coche1: ". $coche->marca."\n";


echo $coche->otra;

