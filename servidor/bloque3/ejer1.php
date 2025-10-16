<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión de Grados</title>
</head>
<body>

<form action="" method="get">
  <p>Grados: <input type="number" name="grados" ></p>
  
  <p>
    <input type="submit" value="Enviar">
    <input type="reset">
  </p>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['grados']) && $_GET['grados'] !== '') {

        $grados = ($_GET['grados']); 
        $farenheit = ($grados * 9 / 5) + 32;
        echo "<p>$grados grados Celsius son $farenheit grados Fahrenheit.</p>";

    } else {

        echo "<p'>No se ingresaron grados.</p>";
    }
}

?>

</body>
</html>
