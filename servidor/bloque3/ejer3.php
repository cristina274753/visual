
<?php

$num1="";
$num2="";



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    /*validar si no esta vacio*/
    if (isset($_GET['num1']) && isset($_GET['num2'])) {        
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];

        /*validar si es un numero*/
        if (is_numeric($num1) && is_numeric($num2)) {
            if (isset($_GET['num1']) && isset($_GET['num2'])) {        
                $num1 = $_GET['num1'];
                $num2 = $_GET['num2'];

                /*validar si es suma, resta, multipliccaion o division*/
                if (isset($_GET['suma'])) {
                    $resultado = $num1 + $num2;
                    echo "<p>El resultado de la suma es: $resultado</p>";
                } elseif (isset($_GET['resta'])) {
                    $resultado = $num1 - $num2;
                    echo "<p>El resultado de la resta es: $resultado</p>";
                } elseif (isset($_GET['multiplica'])) {
                    $resultado = $num1 * $num2;
                    echo "<p>El resultado de la multiplicación es: $resultado</p>";
                } elseif (isset($_GET['divide'])) {
                    if ($num2 != 0) {
                        $resultado = $num1 / $num2;
                        echo "<p>El resultado de la división es: $resultado</p>";
                    } else {
                        echo "<p>Error: no se puede dividir por 0</p>";
                    }
                }
            }
        } else {
            echo "<p>Por favor, introduce números válidos.</p>";

        }
    }
    
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>

<form action="" method="get">

  <p>nombre: <input type="text" name="nombre" ></p>
  <p>apellidos: <input type="text" name="apellidos" ></p>
  
  <p>
    <input type="submit" value="+" name="suma">
    <input type="submit" value="-" name="resta">
    <input type="submit" value="*" name="multiplica">
    <input type="submit" value="/" name="divide">
  </p>
</form>


</body>
</html>
