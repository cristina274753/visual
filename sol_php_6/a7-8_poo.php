<?php
class Coche
{
    private string $marca = '';
    private string $modelo = '';
    private int $anyo;

    //constructor
    public function __construct(string $marca, string $modelo, int $anyo = 2021)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anyo = $anyo;
    }
    //GETTER & SETTER
    public function getMarca(){
        return $this->marca;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getAnyo(){
        return $this->anyo;
    }
    public function setMarca(string $marca){
        $this->marca = $marca;
    }
    public function setModelo(string $modelo){
        $this->modelo = $modelo;
    }
    public function setAnyo(int $anyo){
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
$coche->setMarca("Ejemplo");
echo "Marca del coche1: ". $coche->getMarca()."\n";

//mostrar la información del coche
//$coche->mostrarInfo();

$coche2 = new Coche("Peugeot","208" );
echo "Modelo del coche2: ". $coche->getModelo();

//mostrar la información del coche
//$coche2->mostrarInfo();



