<?php

   $alumnos=['lucas','maria','paco','alejandro','cristina'];
   $cont=0;
   $indice=0;


    while($cont<count($alumnos)){

        echo '<p> alumno: '.$alumnos[$cont];

        if(strlen($alumnos[$cont])>=5){
        $indice++;

    }

        $cont ++;



    }

    
    echo '<p>total de alumnos de mas de 5 letras: '.$indice.'</p>';






?>