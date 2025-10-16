<?php


$tareas = [];


if (isset($_POST['tareas_serializadas'])) {
    $tareas = unserialize($_POST['tareas_serializadas']);
}


//agregar tarea

if (isset($_POST['agregar'])) {

    if (!empty(trim($_POST['tarea']))) {

        $tareas[] = trim($_POST['tarea']);
    } else {
        echo "<p>hay que meter una tarea antes de añadirla</p>";
    }
}



//borrar tareas

if (isset($_POST['borrar'])) {
    $tareas = [];
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Tareas</title>
    
</head>

<body>

    <h2>lista de tareas</h2>

    <form method="post">

        <input type="text" id="tarea" name="tarea"><br>


        <input type="hidden" name="tareas_serializadas" value="<?php echo htmlspecialchars(serialize($tareas)); ?>">

        <input type="submit" name="agregar" value="AgregarTarea">
        <input type="submit" name="borrar" value="BorrarTareas">
    </form>

    <?php if (empty($tareas)) : ?>
        <p>No hay tareas registradas.</p>
    <?php else : ?>
        <ul>
            <?php foreach ($tareas as $tarea) : ?>
                <li><?php echo htmlspecialchars($tarea); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
