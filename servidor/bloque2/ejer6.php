<?php

   $numSemana=rand(1,7);

   switch ($numSemana) {
  case 1:
    echo '<p>Lunes</p>';
    break;
  case 2:
    echo '<p>Martes</p>';
    break;
  case 3:
    echo '<p>Miercoles</p>';
    break;
  case 4:
    echo '<p>Jueves</p>';
    break;
  case 5:
    echo '<p>Viernes</p>';
    break;
  case 6:
    echo '<p>Sabado</p>';
    break;
  default:
    echo '<p>Domingo</p>';
}

$diasDomingo=7-$numSemana;

if ($diasDomingo==0){
    echo '<p> quedan para el proximo domingo: 7 dias';
} else{
    echo '<p> quedan para el proximo domingo: ' .$diasDomingo. ' dias';

}


?>