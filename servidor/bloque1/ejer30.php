<?php

    $frutas= ['manzana', 'platano','kiwi', 'pera'];

    $frutas[3]='naranja';
    $frutas []='melon';

    echo "<pre>";
    print_r ($frutas);
    echo "</pre>";

    echo implode(",", $frutas);

    $cadena="pepe;juan;ana;rosa";
    $persona=explode(";",$cadena);

    echo "<pre>";
    print_r($persona);
    echo "</pre>";

    

?>