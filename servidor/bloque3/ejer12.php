<?php

$contenido=file_get_contents('preguntas.json');
$preguntas=json_decode($contenido, true);

$indices=array_rand($preguntas, 3);
$preguntas3=[];

$correctas=[];


foreach ($indices as $i){
    $preguntas3[]=$preguntas[$i];
    $correctas[]=$preguntas[$i]['respuesta_correcta'];

}


$pregunta = $preguntas3[0];
$textoPregunta = $pregunta['pregunta'];
$opciones = $pregunta['opciones'];
$respuestaCorrecta = $pregunta['respuesta_correcta'];





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cuestionario</title>
</head>
<body>
    
    <h1>Cuestionario</h1>
    <form action="resultado.php" method="POST">
        <label><?php echo htmlspecialchars($textoPregunta); ?></label><br><br>

        <?php foreach ($opciones as $opcion): ?>
            <input 
                type="radio" 
                name="respuesta" 
                value="<?php echo htmlspecialchars($opcion); ?>">
            <label><?php echo htmlspecialchars($opcion); ?></label><br>
        <?php endforeach; ?>
        <br>
         <label><?php echo htmlspecialchars($textoPregunta); ?></label><br><br>

        <?php foreach ($opciones as $opcion): ?>
            <input 
                type="radio" 
                name="respuesta" 
                value="<?php echo htmlspecialchars($opcion); ?>">
            <label><?php echo htmlspecialchars($opcion); ?></label><br>
        <?php endforeach; ?>
        <br>
         <label><?php echo htmlspecialchars($textoPregunta); ?></label><br><br>

        <?php foreach ($opciones as $opcion): ?>
            <input 
                type="radio" 
                name="respuesta" 
                value="<?php echo htmlspecialchars($opcion); ?>">
            <label><?php echo htmlspecialchars($opcion); ?></label><br>
        <?php endforeach; ?>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>