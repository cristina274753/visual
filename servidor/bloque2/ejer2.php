<?php

    
    if ($$_GET['dia']==true){
        echo "hay dia";
    }
    else {
        //alimentamos el generador de aleatorios
        srand (time());
        //generamos un número aleatorio
        $dia_aleatorio = rand(1,7);
        echo "se genera dia aleaatorio";
    }



?>