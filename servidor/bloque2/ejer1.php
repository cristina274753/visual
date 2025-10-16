<?php

    //alimentamos el generador de aleatorios
    srand (time());
    //generamos un número aleatorio
    $numero_aleatorio = rand(-5,45);

    echo "la temperatura es: $numero_aleatorio";
    echo "<br>";

    if ($numero_aleatorio>=30){
        echo "hace calor";
    }
    else if($numero_aleatorio<15){
        echo "hace frio";
    }

    else{
        echo "el clima es templado";
    }

?>