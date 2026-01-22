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
            //si la propiedad es el año, comprobamos que no sea <=1886
            if ($propiedad ==='anyo' && $valor<=1886){
                echo "Año no permitido";
            }else{
            $this->$propiedad = $valor;
            }
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
// $coche->anyo = 1900;
$coche->anyo = 1800;

// echo "Año del coche: ". $coche->anyo;



