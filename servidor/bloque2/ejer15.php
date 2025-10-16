<?php


function crearTabla($num){
    $total= ' <tr>';
    $cont=1;

    for ($i=0; $i>$num; $i++){
        $total= $total."<th>$cont</th>";
        $cont++;
    }

    $total=$total.'</tr> <tr>';
    
    for ($i=0; $i>$num; $i++){
        $total=$total."<td>$cont</td>";
        $cont++;
    }

    $total=$total.'</tr> </table>';

    return $total;
}

echo '<table>';
      


echo crearTabla(1);
echo '<br>';
echo crearTabla(4);


?>