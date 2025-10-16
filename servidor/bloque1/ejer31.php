<?php

    $persona= ['nombre'=>'pepe', 'edad'=>19, 'profesion'=>'maestro'];

    $datos= [2,5,6,9,7,8];

    $persona['nombre']='juan';

    echo $persona[1];

    echo "<pre>";
    print_r($persona);
    echo "</pre>";

    foreach ($datos as $dato){

    echo $dato."<br>";
    }

    echo "<br>";

    foreach ($persona as $valor){
        echo $valor."<br>";
    }

    $num_elementos= count($datos);
    echo "<br>";
    echo $num_elementos; 
    
    

?>