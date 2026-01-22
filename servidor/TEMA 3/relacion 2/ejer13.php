<?php

    $estudiantes = array(
        ["nombre" => "paco",
        "notas" => 3],

        ["nombre"=> "cristina",
        "notas"=>9]
    );

    $mas5=0;
    $alta=0;
    $min=0;

    foreach($estudiantes as $estudiante){
        echo $estudiante;

        if ($estudiante["notas"]>=5) {
            $mas5++;
        }

        if ($estudiante["notas"]>$alta) {
            $alta=$estudiantes["notas"];
        }

        if ($estudiante["notas"]<$min) {
            $min=$estudiantes["notas"];
        }

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<table>
            <tr>
                <th>Estudiante</th>
                <th>Nota</th>
            </tr>"

            <?php
            echo "<tr>
                <td>$nombre</td>
                <td>$nota</td>
              </tr>"

            ?>

</table>

 <p class='notice'>
            - Número de aprobados: <?= $aprob; ?><br>
            - La nota máxima es <?= $max; ?><br>
            - La nota mínima es <?= $min; ?><br>
        </p>
</body>
</html>