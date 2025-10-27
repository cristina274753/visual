<?php

    $estudiantes = array(
        "12",
        "34",
        "14"
    );

    $suma=array_sum($estudiantes);
    $mayores=0;
    $num=count($estudiantes);
    $media=($suma/$num)/2;
    $cont=0;
    $edad=0;

    do {

        $edad=$estudiantes[$cont];

        if ($edad>=18) {
            $mayores++;
        }

        $cont++;

    } while (!$cont<$num);

    echo $media. " ". $mayores;

?>