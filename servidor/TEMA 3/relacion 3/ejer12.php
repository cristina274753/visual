<?php

const FICHERO = 'e12_preguntas.json';
const NUM_PREGUNTAS = 3;

/**
 * Cargar preguntas desde JSON
 * Devuelve un array de preguntas
 */
function cargarPreguntas($fichero = FICHERO) {

    if (!file_exists($fichero)) return [];
    $contenido = file_get_contents($fichero);
    $preguntas = json_decode($contenido, true); /*convertir en array asociativo*/
    return $preguntas ?? [];
}

/**
 * Seleccionar N preguntas aleatorias
 * Devuelve array con índices
 */
function seleccionarPreguntas($preguntas, $num = NUM_PREGUNTAS) {
    return array_rand($preguntas, $num);
}

/**
 * Generar UID único y guardar soluciones en archivo temporal
 * Devuelve UID generado
 */
function guardarSoluciones($preguntas, $indices) {
    $soluciones = [];
    foreach ($indices as $i) {
        $soluciones[] = $preguntas[$i]['respuesta_correcta'];
    }
    $uid = uniqid();
    $archivo = "tmp/solucion_$uid";
    file_put_contents($archivo, implode(",", $soluciones));
    return $uid;
}

/**
 * Mostrar preguntas en HTML
 */
function mostrarPreguntas($preguntas, $indices) {
    $contador = 0;
    foreach ($indices as $i) {
        echo "<p>";
        echo "<label>" . ($contador + 1) . ".- " . $preguntas[$i]['pregunta'] . "</label><br>";
        foreach ($preguntas[$i]['opciones'] as $opcion) {
            echo "<input type='radio' name='respuesta_$contador' value='$opcion'> $opcion<br>";
        }
        echo "</p>";
        $contador++;
    }
}

/**
 * Comprobar respuestas del usuario
 * Devuelve número de aciertos
 */
function comprobarRespuestas($uid, $respuestas) {
    $archivo = "tmp/solucion_$uid";
    if (!file_exists($archivo)) return false;
    $soluciones = explode(",", file_get_contents($archivo));
    $acertadas = 0;
    foreach ($soluciones as $i => $solucion) {
        if (($respuestas[$i] ?? '') == $solucion) $acertadas++;
    }
    unlink($archivo); // eliminar temporal
    return $acertadas;
}

/**
 * Mostrar mensaje HTML
 */
function mostrarMensaje($mensaje) {
    if (!empty($mensaje)) {
        echo "<p>$mensaje</p>";
    }
}



// Cargar preguntas
$preguntas = cargarPreguntas();

// Primera visita: seleccionar preguntas y guardar soluciones
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $indices = seleccionarPreguntas($preguntas);
    $uid = guardarSoluciones($preguntas, $indices);
}

// Si se envió el formulario: comprobar respuestas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    $respuestas = [];
    for ($i = 0; $i < NUM_PREGUNTAS; $i++) {
        $respuestas[$i] = $_POST["respuesta_$i"] ?? '';
    }
    $uid = $_POST['uid'] ?? '';
    $aciertos = comprobarRespuestas($uid, $respuestas);
    $mensaje = "Aciertos: $aciertos";
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>
    
        <h1>examen tipo test</h1>

        <form action="" method="post">

            <?php mostrarPreguntas($preguntas, $indices ?? []); ?>

            <input type="hidden" name="uid" value="<?= $uid ?>">
            <input type="submit" name="enviar" value="Enviar">

        </form>

<?php mostrarMensaje($mensaje ?? ''); ?>

    

</body>
</html>