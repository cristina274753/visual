<?php

$frase = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $frase = $_POST['frase']??'';
    $posicion = $_POST['posicion']??'';

    $resultado = "";

    //validar los datos
    if ($frase===''){

        echo "<p>la frase esta vacia</p>";
        return;
    }

    if (!is_numeric($posicion)){

        echo "<p>la posicion debe ser un numero</p>";
        return;
    }

    if($posicion===0 || $posicion===''){

        echo "<p>no puede ser 0, ni estar vacio/p>";
        return;
    }

    //cifrar la frase
    $resultado =  cifradoCesar($frase, $posicion);
    

    echo "<p>Frase normal: " . htmlspecialchars($frase) . "</p>";
    echo "<p>Frase cifrada: " . htmlspecialchars($resultado) . "</p>";
}


function cifradoCesar($frase, $posicion) {

    $resultado = "";
    $cadenaMinusculas = "abcdefghijklmnopqrstuvwxyz";
    $cadenaMayusculas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    $arrCadenaMinusculas= mb_str_split($cadenaMinusculas);
    $arrCadenaMayusculas= mb_str_split($cadenaMayusculas);
    $arrTexto= mb_str_split($frase);

    foreach ($arrTexto as $caracter){
        //buscar el índice en el array de minusculas
        $indice = array_search($caracter, $arrCadenaMinusculas);
        //aplicamos el desplazamienot
        $indiceDesplazado = ($indice + $posicion) % count($arrCadenaMinusculas);
        $resultado .= $arrCadenaMinusculas[$indiceDesplazado];
    }

    for ($i = 0; $i < strlen($frase); $i++) {

        $letra= $frase[$i];

        if (in_array($letra, $arrCadenaMayusculas)){

            
        }
        
    }

   /* for ($i = 0; $i < strlen($frase); $i++) {

        $letra = $frase[$i];
        $nuevaletra = chr((ord($letra) + $posicion));
        $resultado .= $nuevaletra;
    }*/
    return $resultado;
}

?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cifrado Julio cesar</title>
    
</head>

<body>

    <h2>Cifrado</h2>

    <form method="post">

        <input type="text" id="frase" name="frase"><br>
        <input type="number" id="posicion" name="posicion" ><br>



        <input type="submit" name="agregar" value="AgregarArchivo">
    </form>

</body>
</html>
