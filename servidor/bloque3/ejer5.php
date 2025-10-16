
<?php

$color="";
$fuente="";
$estilo="";

$narrativo = array("El reloj marcó la hora, pero él no se movió.", "A cada segundo, el tren se alejaba más.", "Guardó la carta, sabiendo que era demasiado tarde.", "Esperó toda la tarde, aunque sabía que no volvería.", "El tiempo no curó, pero sí desgastó el dolor.");
$rand_keys = array_rand($narrativo, 1);


$poetico = array("El tiempo es un río que no mira atrás.", "Los minutos caen como hojas secas.", "El reloj late como un corazón sin dueño.", "La eternidad cabe en un suspiro.", "El tiempo no pasa, somos nosotros los que nos vamos.");
$rand_keys = array_rand($poetico, 1);


$ensayo = array("El tiempo no se detiene por nadie.", "Todo cambia con el paso del tiempo.", "El presente es el único instante real.", "El tiempo organiza nuestra percepción de la vida.", "La forma en que usamos el tiempo define nuestras prioridades.");
$rand_keys = array_rand($ensayo, 1);


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    /*validar si no esta vacio*/
    if (isset($_GET['color']) && isset($_GET['fuente']) && isset($_GET['estilo'])) {        
        $color = $_GET['color'];
        $fuente = $_GET['fuente'];
        $estilo = $_GET['estilo'];


        /*ver de que tipo es */
        if($_GET['estilo'] == 'narrativo'){
            echo "<p style='font-style:$estilo;color:$color;font-family:$fuente'>".$narrativo[$rand_keys]."</p>";
        } elseif($_GET['estilo'] == 'poetico'){
            echo "<p style='font-style:$estilo;color:$color;font-family:$fuente'>".$poetico[$rand_keys]."</p>";

        } elseif($_GET['estilo'] == 'ensayo'){
            echo "<p style='font-style:$estilo;color:$color;font-family:$fuente'>".$ensayo[$rand_keys]."</p>";


        }
            
       
        
        
    }
    
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ColorFuenteEstilo</title>
</head>
<body>

<form action="" method="get">

   <select name="color">
  <option value="red">rojo</option>
  <option value="green">verde</option>
  <option value="blue">azul</option>
</select>

  <select name="fuente">
  <option>arial</option>
  <option>verdana</option>
  <option>Courier</option>
</select>

<select name="estilo">
  <option value="narrativo">narrativo</option>
  <option value="poetico">poetico</option>
  <option value="ensayo"
  >ensayo</option>
</select>
  
  <p>
    <input type="submit" value="Enviar">
  </p>
</form>


</body>
</html>
