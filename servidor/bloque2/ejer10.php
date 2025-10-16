<?php

   $edades=['18','15','19','13','20'];
   $cont=0;
   $sumaEdad=0;
   $mayores=0;

   do{

    $sumaEdad+= $edades[$cont];

    if($edades[$cont]>=18){
        $mayores++;

    }
    $cont++;
   }while($cont<count($edades));

   $sumaEdad=$sumaEdad/count($edades);

    echo '<p>media de los alumnos: '.$sumaEdad.'</p>';
    echo '<p>hay mayores de edad: '.$mayores.'</p>';



?>