<?php

    $estudiantes=[
        "paola","pepe","paco","cristina","alejandro"
    ];

    $cont=0;
    $total=count($estudiantes);
    $mas5=0;

    while ($cont<$total) {
        echo $estudiantes[$cont];

        if (strlen($estudiantes[$cont]>=5)) {
            $mas5++;
        }

        $cont++;
    }


    echo "<br>Total de estudiantes: " . $totalEstudiantes . "<br>";
    echo "Estudiantes con más de 5 letras en su nombre: " . $contadorLargoNombre;
?>