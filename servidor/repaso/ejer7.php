<?php
$archivo = 'tareas.txt';
$errores = [];
$mensaje="";

// Leer tareas existentes si el archivo existe
if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    $tareas = array_filter(array_map('trim', explode(',', $contenido)));
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['agregar'])) {

        $nueva = trim($_POST['tarea']);

/*validar tarea*/

        if (!empty($nueva)) {

            $tareas[] = $nueva;
            $cadena = implode(',', $tareas);
            file_put_contents($archivo, $cadena);

            $mensaje="<ul>";

            foreach ($tareas as $t){
                
                $mensaje.="<li>$t</li>";
            }

            $mensaje.="</ul>";


        } else {
            $errores[] = "La tarea no puede estar vacía.";
        }
    } elseif (isset($_POST['borrar'])) {
        $tareas = [];
        file_put_contents($archivo, '');
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Tareas</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>
    <h2>Registrar Tarea</h2>

    <?php if (!empty($errores)): ?>
        <div class="errores">
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post">
        <textarea name="tarea" placeholder="Escribe tu tarea aquí..."></textarea><br>
        <div class="botones">
            <button type="submit" name="agregar">Agregar tarea</button>
            <button type="submit" name="borrar" style="background-color:red; color:white;">Borrar todas</button>
        </div>
    </form>

    <?php
    if (!empty($errores)): ?>
      <p class='notice'>
        <?php foreach ($errores as $e): ?>
          <?= htmlspecialchars($e) ?><br>
        <?php endforeach; ?>
      </p>
    <?php
    elseif (!empty($mensaje)): ?>
      <div class='notice'><?= ($mensaje); ?></div>
    <?php endif; ?>
</body>
</html>
