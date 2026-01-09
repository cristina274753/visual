<?php
class Coche
{
    //constructor
    public function __construct(
            private string $marca, 
            private string $modelo, 
            private int $anyo = 2021)
    {
        echo "nuevo conche creado\n";
    }

    //compara la antiguedad del cocche actual con el que se le pasa por parámetros
    public function compararAntiguedad(Coche $otroCoche){
        
        $otroAnyo = $otroCoche->anyo;
        if ($this->anyo < $otroAnyo){
            echo "el coche ".$this->modelo. " tiene menos años que ". $otroCoche->modelo;
        }elseif ($this->anyo > $otroAnyo){
            echo "el coche ".$this->modelo. " tiene más años que ". $otroCoche->modelo;
        } else {
            echo "ambos coches tienen la misma antigüedad"; 
        }
    }
    //método destructor
    public function __destruct()
    {
        echo "El coche con marca: " . $this->marca . " - modelo: " . $this->modelo . " - año :" . $this->anyo . " HA SIDO DESTRUIDO\n";
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

$coche = new Coche("Volkswagen", "Passat", 2010);
unset($coche);
$coche2 = new Coche("Peugeout", "208", 2010);

//$coche->compararAntiguedad($coche2);




