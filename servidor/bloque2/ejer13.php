<?php

$estudiante = array(
  array("Nombre" => "Ana", "nota" => "3"),
  array("Nombre" => "Luis", "nota" => "10"),
   array("Nombre" => "Sofia", "nota" => "7")
);

echo '<table> <caption>Ejemplo de tabla</caption>
  <thead>
    <tr>
      <th>nombre</th>
      <th>nota</th>
          </tr>
           </thead>'; 
      


foreach ($estudiante as $indice => $estudiante) {
    foreach ($estudiante as $clave => $valor) {

        echo "<tr>
    <td>$clave</td>
    <td>$valor</td>
  </tr>";
     }
} 

echo "</table>";


?>