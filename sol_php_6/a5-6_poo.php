<?php
class Coche
{
    public string $marca = '';
    public string $modelo = '';
    public int $anyo;

    //constructor
    public function __construct(string $marca, string $modelo, int $anyo = 2021)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anyo = $anyo;
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

//mostrar la información del coche
$coche->mostrarInfo();

$coche2 = new Coche("Peugeot","208" );

//mostrar la información del coche
$coche2->mostrarInfo();


